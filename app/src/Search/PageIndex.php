<?php


namespace SilverStripe\Bambusa\Search;

use SilverStripe\Bambusa\Pages\BlocksPage;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\FullTextSearch\Search\Variants\SearchVariantVersioned;
use SilverStripe\FullTextSearch\Solr\SolrIndex;
use SilverStripe\Versioned\Versioned;

class PageIndex extends SolrIndex
{
    public function init()
    {
        $this->addClass(SiteTree::class, ['origin' => 'SiteTree']);
        $this->addClass('Page', ['origin' => 'Page']);
        $this->addClass(BlocksPage::class, ['origin' => 'BlocksPage']);
        $this->addFulltextField('Content');
        $this->addFulltextField('Title', null, ['boost' => 2]);
        $this->addFulltextField('ElementsForSearch');
        $this->addStoredField('Link');
        $this->addStoredField('Title');

        $this->excludeVariantState([SearchVariantVersioned::class => Versioned::DRAFT]);
    }
}
