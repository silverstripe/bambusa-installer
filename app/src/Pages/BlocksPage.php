<?php

namespace SilverStripe\Bambusa\Pages;

use DNADesign\Elemental\Extensions\ElementalPageExtension;
use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\HeaderField;
use Page;

/**
 * @mixin ElementalPageExtension
 */
class BlocksPage extends Page
{
    private static $table_name = 'BlocksPage';

    private static $description = 'A modular page composed of content blocks';

    private static $extensions = [
        ElementalPageExtension::class,
    ];

    private static $has_one = [
        'HeaderElements' => ElementalArea::class,
    ];

    private static $owns = [
        'HeaderElements',
    ];

    private static $casting = [
        'BlockContent' => 'HTMLText',
        'ElementsForSearch' => 'HTMLText',
    ];

    /**
     * @var array
     */
    private static $field_include = [
        'ElementalAreaID',
        'HeaderElementsID'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $headerArea = $fields->fieldByName('Root.Main.HeaderElements');
        $fields->removeByName('Root.Main.HeaderElements');
        $fields->addFieldToTab('Root.Main', $headerArea, 'ElementalArea');
        $fields->addFieldToTab(
            'Root.Main',
            HeaderField::create('HeaderBlocksHeader', 'Header blocks'),
            'HeaderElements'
        );
        $fields->addFieldToTab(
            'Root.Main',
            HeaderField::create('ContentBlocksHeader', 'Content blocks'),
            'ElementalArea'
        );
        return $fields;
    }

    public function getElementsForSearch()
    {
        $extension = Injector::inst()->get(ElementalPageExtension::class);
        $extension->setOwner($this);
        $result = $extension->getElementsForSearch();

        // New lines become <br> in ContextSummary
        return str_replace("\n", '', $result);
    }
}
