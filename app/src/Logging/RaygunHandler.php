<?php

namespace SilverStripe\Bambusa\Logging;

use SilverStripe\Core\Environment;
use SilverStripe\Raygun;

/**
 * Custom RaygunHandler that adds SS_TRAVIS_* variables to Raygun CustomUserData
 */
class RaygunHandler extends Raygun\RaygunHandler
{
    protected function write(array $record)
    {
        if (isset($record['formatted']['custom_data'])) {
            $customData = [];

            foreach (array_merge($_ENV, $_SERVER, Environment::getVariables()['env']) as $key => $val) {
                $prefix = 'SS_TRAVIS_';
                if (substr($key, 0, strlen($prefix)) !== $prefix) {
                    continue;
                }

                $customData[$key] = $val;
            }

            $record['formatted']['custom_data'] = array_merge(
                $record['formatted']['custom_data'],
                $customData
            );
        }

        return parent::write($record);
    }
}
