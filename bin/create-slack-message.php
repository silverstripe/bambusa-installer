#!/usr/bin/env php
<?php

// This script main purpose is to produce valid JSON.
// It incorporates `composer outdated -D --format=json` output into
// slack message json that may be sent to the webhook

$dependencies = json_decode(file_get_contents('php://stdin'), true);

if (isset($dependencies['installed'])) {
    $deps = array_reduce($dependencies['installed'], 'filter_bambusa_deps', []);

    echo json_encode(['text' => 'Bambusa upgrades available: ```' . json_encode($deps, JSON_PRETTY_PRINT) . '```', 'mrkdwn' => true]);
} else {
    echo json_encode([]);
}

/**
 * Filter dependencies that
 *  - only contain major upgrades
 *  - do not contain `@dev` stability versions
 *
 * @param array $dependencies The augmented dependency list
 * @param array $dependency The dependency to be checked and added to dependencies if necessary
 *
 * @return array Returns the $dependencies argument with added $dependency
 */
function filter_bambusa_deps(array $dependencies, array $dependency)
{
    if (!isset($dependency['version']) || !isset($dependency['latest'])) {
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
