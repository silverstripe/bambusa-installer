<?php

// If we have to boot the whole stack, autosuggest is
// functionally useless. This naked PHP script is designed
// to generate very fast response times. The trade off is
// that there's a lot of hard-coded configuration and duplicated
// code, because we don't have the shared app state.

header('Content-type', 'application/json');

$server = getenv('SOLR_SERVER');
$port = getenv('SOLR_PORT');
$path = getenv('SOLR_PATH');

if (!$server || !$port || !$path) {
    return '[]';
}

$q = $_GET['q'] ?? '';
$locale = $_GET['l'] ?? 'en_US';

$baseURL = sprintf(
    'http://%s:%s%s/%s/%s?',
    getenv('SOLR_SERVER'),
    getenv('SOLR_PORT'),
    getenv('SOLR_PATH'),
    'SilverStripe-Bambusa-Search-PageIndex',
    'select'
);
$query = http_build_query([
    'qf' => 'SilverStripe\CMS\Model\SiteTree_Title^2 _text',
    'fq' => '+(_locale:"' . $locale .'" (*:* -_locale:[* TO *])) ' .
            '+(_versionedstage:"Live" (*:* -_versionedstage:[* TO *]))',
    'fl' => 'Page_Title,Page_Link',
    'wt' => 'json',
    'json.nl' => 'map',
    'q' => $q,
    'start' => 0,
    'rows' => 5
]);

$url = sprintf('%s%s', $baseURL, $query);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// Autosuggest should not take long.
curl_setopt($ch, CURLOPT_TIMEOUT, 3);

$response = curl_exec($ch);

echo $response ?: '[]';
