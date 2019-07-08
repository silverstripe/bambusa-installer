<?php

namespace SilverStripe\Bambusa\Models;

use SilverStripe\Core\Environment;
use SilverStripe\Core\Flushable;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\DB;
use SilverStripe\Security\Security;

/**
 * The component handling environment variable snapshots, solving our particular use case which is
 * distribution of database snapshots across kubernetes pods that don't have environment variables
 * defined on the original environment (where the database snapshot gets taken).
 *
 * This functionality lets us control environment variables in a centralised way
 * through SilverStripe Platform UI and then distribute them across kubernetes cluster through the database
 * snapshots.
 *
 * How it works:
 *  - On /dev/build it persists into the database all environment variables starting with SS_*
 *  - If you override variable with an empty string, then it deletes it from the database
 */
class EnvVarSnapshot extends DataObject
{
    private static $table_name = 'EnvVarSnapshot';

    private static $db = [
        'key' => 'Varchar(255)',
        'val' => 'Varchar(255)'
    ];

    private static $indexes = [
        'key' => [
            'type' => 'unique'
        ]
    ];

    public function canCreate($member = null, $context = array())
    {
        return false;
    }

    public function canEdit($member = null)
    {
        return false;
    }

    public function canDelete($member = null)
    {
        return false;
    }

    public function canView($member = null)
    {
        return false;
    }

    /**
     * Take a snapshot of the environment variables and persist it to the database
     *
     * {@inheritdoc}
     */
    public function requireDefaultRecords()
    {
        foreach (Environment::getVariables()['env'] as $key => $val) {
            if (substr($key, 0, 3) !== 'SS_') {
                continue;
            }

            if (strlen($val) === 0 || $val === null) {
                static::get()->filter(['key' => $key])->removeAll();
                continue;
            }

            $var = static::get()->filter(['key' => $key])->first();

            if ($var !== null) {
                $var->val = $val;
            } else {
                $var = static::create();
                $var->key = $key;
                $var->val = $val;
            }

            $var->write();
        }

        return parent::requireDefaultRecords();
    }
}
