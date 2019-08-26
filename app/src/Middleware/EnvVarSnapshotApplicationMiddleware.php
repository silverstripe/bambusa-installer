<?php

namespace SilverStripe\Bambusa\Middleware;

use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\Middleware\HTTPMiddleware;
use SilverStripe\Core\Environment;
use SilverStripe\ORM\DB;

/**
 * The application middleware handling environment variable snapshots, solving our particular use case which is
 * distribution of database snapshots across kubernetes pods that don't have environment variables
 * defined on the original environment (where the database snapshot gets taken).
 *
 * This functionality lets us control environment variables in a centralised way
 * through SilverStripe Platform UI and then distribute them across kubernetes cluster through the database
 * snapshots.
 *
 * How it works:
 *  - As an application middleware it restores the environment variables from the database,
 *    but does not overwrite defined ones
 *
 * WARNING: this component has to run before Kernel is booted and as such it is not a Director,
 * but HTTPApplication middleware
 */
class EnvVarSnapshotApplicationMiddleware implements HTTPMiddleware
{
    /**
     * Restore undefined environment variables from the snapshot.
     *
     * This is supposed to work as an HTTPApplication middleware (see index.php), and not a Director middleware
     * That means we do not have Kernel booted at this point and as such we cannot use ORM and most of other framework
     *
     * {@inheritdoc}
     */
    public function process(HTTPRequest $request, callable $delegate)
    {
        $ssDatabaseClass = Environment::getEnv('SS_DATABASE_CLASS');
        if (class_exists('mysqli') && ($ssDatabaseClass === false || $ssDatabaseClass === 'MySQLDatabase')) {
            try {
                $connection = new \mysqli(
                    (string)Environment::getEnv('SS_DATABASE_SERVER'),
                    (string)Environment::getEnv('SS_DATABASE_USERNAME'),
                    (string)Environment::getEnv('SS_DATABASE_PASSWORD')
                );

                if (!$connection) {
                    return $delegate($request);
                }

                $database = (string)Environment::getEnv('SS_DATABASE_NAME');

                if (!$connection->select_db($database)) {
                    return $delegate($request);
                }

                $result = $connection->query('select `key`, `val` from `EnvVarSnapshot`');
                if ($result !== false) {
                    $definedVars = Environment::getVariables()['env'];
                    foreach ($result as $variable) {
                        if (!array_key_exists($variable['key'], $definedVars)) {
                            Environment::setEnv($variable['key'], $variable['val']);
                        }
                    }
                }
            } catch (\Exception $_) {
                // nothing to do
            }
        }

        return $delegate($request);
    }
}
