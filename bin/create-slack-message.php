#!/usr/bin/env php
<?php

// This script main purpose is to produce valid JSON.
// It incorporates `composer outdated -D --format=json` output into
// slack message json that may be sent to the webhook

$dependencies = json_decode(file_get_contents('php://stdin'), true);

if (isset($dependencies['installed'])) {
    echo json_encode(['text' => 'Bambusa upgrades available: ```' . json_encode($dependencies['installed'], JSON_PRETTY_PRINT) . '```', 'mrkdwn' => true]);
} else {
    echo json_encode([]);
}
