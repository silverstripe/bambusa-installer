<?php


namespace SilverStripe\Bambusa\Search;

use Page;
use SilverStripe\Bambusa\Pages\BlocksPage;
use SilverStripe\FullTextSearch\Solr\SolrIndex;

class PageIndex extends SolrIndex
{
    public function init()
    {
        $this->addClass(Page::class);
        $this->addClass(BlocksPage::class);
        $this->addFulltextField('Content');
        $this->addFulltextField('Title', null, ['boost' => 2]);
        $this->addFulltextField('ElementsForSearch');
        $this->addStoredField('Link');
        $this->addStoredField('Title');
    }
}
