<?php

namespace SilverStripe\Bambusa\Pages;

use DNADesign\Elemental\Extensions\ElementalPageExtension;
use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\Forms\HeaderField;
use Page;

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

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $headerArea = $fields->fieldByName('Root.Main.HeaderElements');
        $fields->removeByName('Root.Main.HeaderElements');
        $fields->addFieldToTab('Root.Main', $headerArea, 'ElementalArea');
        $fields->addFieldToTab('Root.Main', HeaderField::create('HeaderBlocksHeader', 'Header blocks'), 'HeaderElements');
        $fields->addFieldToTab('Root.Main', HeaderField::create('ContentBlocksHeader', 'Content blocks'), 'ElementalArea');
        return $fields;
    }

}
