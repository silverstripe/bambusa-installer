<?php


namespace SilverStripe\Bambusa\Search;


use SilverStripe\Bambusa\Pages\BlocksPage;
use SilverStripe\FullTextSearch\Solr\SolrIndex;

class PageIndex extends SolrIndex
{
    public function init()
    {
        $this->addClass('Page');
        $this->addClass(BlocksPage::class);
        $this->addFulltextField('Content');
        $this->addFulltextField('Title', null, ['boost' => 2]);
        $this->addFulltextField('ElementalArea');
        $this->addFulltextField('HeaderElements');
        $this->addFulltextField('ElementsForSearch');

    }

}
