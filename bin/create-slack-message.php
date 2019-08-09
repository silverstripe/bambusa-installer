#!/usr/bin/env php
<?php

// This script main purpose is to produce valid JSON.
// It incorporates `composer outdated -D --format=json` output into
// slack message json that may be sent to the webhook

$dependencies = json_decode(file_get_contents('php://stdin'), true);

if (isset($dependencies['installed'])) {
    $deps = array_reduce($dependencies['installed'], 'filter_bambusa_deps', []);

    if (!count($deps)) {
        echo json_encode([]);
    } else {
        echo json_encode(['text' => 'Bambusa upgrades available: ```' . json_encode($deps, JSON_PRETTY_PRINT) . '```', 'mrkdwn' => true]);
    }

} else {
    echo json_encode([]);
}

/**
 * Filter dependencies that
 *  - only contain major upgrades
 *  - do not contain `@dev` stability versions
 *  - are not supported modules
 *  - are not ignored modules
 *
 * @param array $dependencies The augmented dependency list
 * @param array $dependency The dependency to be checked and added to dependencies if necessary
 *
 * @return array Returns the $dependencies argument with added $dependency
 */
function filter_bambusa_deps(array $dependencies, array $dependency)
{
    if (!isset($dependency['version']) || !isset($dependency['latest']) || !isset($dependency['name'])) {
        return $dependencies;
    }

    if (is_supported_module($dependency['name'])) {
        return $dependencies;
    }

    if (is_ignored_module($dependency['name'])) {
        return $dependencies;
    }

    if (stripos($dependency['version'], 'dev') !== false) {
        return $dependencies;
    }

    if (stripos($dependency['latest'], 'dev') !== false) {
        return $dependencies;
    }

    $currentMajor = substr($dependency['version'], 0, strpos($dependency['version'], '.'));
    $latestMajor = substr($dependency['latest'], 0, strpos($dependency['latest'], '.'));

    if ($currentMajor === $latestMajor) {
        return $dependencies;
    }

    $dependencies[] = $dependency;
    return $dependencies;
}


/**
 * Returns true if the module is a supported one
 *
 * The list of supported modules is supposed to be a JSON file in "__DIR__.'/supported-modules.json'"
 * The format is a list of dictionaries, every one should have a 'composer' key with the module name.
 * Currently (2019-08-09) the list of the modules is maintained at
 * https://raw.githubusercontent.com/silverstripe/supported-modules/gh-pages/modules.json
 *
 * @param string $name module name
 *
 * @return bool
 */
function is_supported_module($name): bool
{
    static $modules = null;

    if (is_null($modules) && file_exists($fname = __DIR__.'/supported-modules.json')) {
        $modules = [];
        $content = file_get_contents($fname);

        if ($content !== false) {
            foreach (json_decode($content, true) as $module)
            if (isset($module['composer'])) {
                $modules[$module['composer']] = $module['type'] ?? true;
            }
        }
    }

    return isset($modules[$name]);
}

/**
 * Returns true if the module is an ignored one
 *
 * The list of supported modules is supposed to be in "__DIR__.'/ignored-modules.txt'"
 * The format is simple text, a module name per line
 *
 * @param string $name module name
 *
 * @return bool
 */
function is_ignored_module($name): bool
{
    static $modules = null;

    if (is_null($modules) && file_exists($fname = __DIR__.'/ignored-modules.txt')) {
        $modules = [];
        $content = file($fname, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($content !== false) {
            foreach ($content as $module) {
                $modules[trim($module)] = true;
            }
        }
    }

    return isset($modules[$name]);
}
