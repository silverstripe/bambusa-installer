<?php


namespace SilverStripe\Bambusa\Controllers;

use Firesphere\SolrSearch\Queries\BaseQuery;
use PageController;
use SilverStripe\Bambusa\Search\PageIndex;
use SilverStripe\Control\Controller;
use SilverStripe\Control\Director;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\View\ArrayData;
use TractorCow\Fluent\Extension\FluentExtension;

/**
 * Class \SilverStripe\Bambusa\Controllers\SearchController
 *
 */
class SearchController extends PageController
{
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
        $offset = $request->getVar('start') ?: 0;
        /** @var BaseQuery $query */
        $query = new BaseQuery();
        $query->addTerm($q);
        $query->setStart($offset);

        $index = new PageIndex();
        $results = $index->doSearch($query);

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
}
