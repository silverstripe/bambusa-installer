<?php

namespace SilverStripe\Bambusa\Pages;

use DNADesign\Elemental\Extensions\ElementalPageExtension;
use DNADesign\Elemental\Models\ElementalArea;
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
        BlocksPageFluentExtension::class,
    ];

    private static $has_one = [
        'HeaderElements' => ElementalArea::class,
    ];

    private static $owns = [
        'HeaderElements',
    ];

    private static $casting = [
        'BlockContent' => 'HTMLText'
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

    /**
     * Override this method in the SEO extension to allow block content
     * @return array
     */
    public function seoContentFields()
    {
        return [
            'Content',
            'ElementalArea',
            'HeaderElements',
        ];
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        if (!$this->isDraftedInLocale() && $this->isInDB()) {
            // Duplicate main area
            $area = $this->ElementalArea();
            $areaNew = $area->duplicate();
            $this->ElementalAreaID = $areaNew->ID;

            // Duplicate header area
            $area = $this->ElementalArea();
            $areaNew = $area->duplicate();
            $this->ElementalAreaID = $areaNew->ID;
        }

        return;
    }
}
