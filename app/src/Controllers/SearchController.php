<?php


namespace SilverStripe\Bambusa\Controllers;

use SilverStripe\Bambusa\Search\PageIndex;
use SilverStripe\Control\Controller;
use SilverStripe\Control\Director;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\FullTextSearch\Search\Queries\SearchQuery;
use PageController;
use SilverStripe\View\ArrayData;
use TractorCow\Fluent\Extension\FluentExtension;

class SearchController extends PageController
{

    /**
     * Map Macrons to non-macrons, otherwise they're stripped
     * out of the query and replaced by a space
     * @var array
     */
    private static $macrons = [
        'ā' => 'a',
        'ē' => 'e',
        'ī' => 'i',
        'ō' => 'o',
        'ū' => 'u',
        'Ā' => 'A',
        'Ē' => 'E',
        'Ī' => 'I',
        'Ō' => 'O',
        'Ū' => 'U'
    ];


    /**
     * Because this is a standalone controller and not affected by the
     * fluent routing, we have to ensure that the language selector
     * generates ?l=$locale links. All other links on the page are rendered
     * with the sub URL, so this parameter  doesn't get forwarded to subsequent
     * page views.
     *
     * @param null $locale
     * @return ArrayData
     */
    public function LocaleInformation($locale = null)
    {
        $data = Injector::inst()->get(FluentExtension::class)
            ->LocaleInformation($locale);

        $query = http_build_query([
            'l' => $locale,
            'q' => $this->getRequest()->getVar('q')
        ]);

        $link = $data->Link . '?' . $query;

        $data->Link = $link;

        return $data;
    }


    public function index(HTTPRequest $request)
    {
        $q = $request->getVar('q');
        $sanitised = self::sanitiseQuery($q);
        $offset = $request->getVar('start') ?: 0;
        $query = SearchQuery::create()->addSearchTerm($sanitised);
        $limit = SearchQuery::$default_page_size;

        $results = PageIndex::singleton()->search(
            $query,
            $offset,
            $limit,
            [
                'spellcheck' => 'true',
                'spellcheck.collate' => 'true'
            ]
        );

        return $this->customise([
            'Results' => $results,
            'Query' => $q,
        ])->renderWith([
            'Page_results',
            'Page',
        ]);
    }

    public function Link($action = null)
    {
        return Controller::join_links(
            Director::baseURL(),
            'search'
        );
    }

    /**
     * http://e-mats.org/2010/01/escaping-characters-in-a-solr-query-solr-url/
     * @param string $q
     * @return string
     */
    private static function sanitiseQuery(string $q): string
    {
        $match = ['\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' '];
        $replace = ['\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ '];
        $match = array_merge($match, array_keys(self::$macrons));
        $replace = array_merge($replace, array_values(self::$macrons));

        return str_replace($match, $replace, $q);
    }
}
