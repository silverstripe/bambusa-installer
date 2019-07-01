<?php

namespace {

    use DNADesign\Elemental\Extensions\ElementalPageExtension;
    use DNADesign\Elemental\Models\ElementalArea;
    use SilverStripe\Bambusa\Blocks\CarouselBlock;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\ElementalBannerBlock\Block\BannerBlock;
    use SilverStripe\Forms\HeaderField;
    use Symbiote\GridFieldExtensions\GridFieldAddNewMultiClass;

    class Page extends SiteTree
    {
        private static $extensions = [
            ElementalPageExtension::class,
        ];

        private static $has_one = [
            'HeaderElements' => ElementalArea::class,
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $headerArea = $fields->fieldByName('Root.Main.HeaderElements');
            $fields->removeByName('Root.Main.HeaderElements');
            $fields->addFieldToTab('Root.Main', $headerArea, 'ElementalArea');
            $fields->addFieldToTab('Root.Main', HeaderField::create('HeaderBlocksHeader', 'Header blocks'), 'HeaderElements');
            $fields->addFieldToTab('Root.Main', HeaderField::create('ContentBlocksHeader', 'Content blocks'), 'ElementalArea');
//            $fields->fieldByName('Root.Main.HeaderElements')->setTypes([
//                CarouselBlock::class,
//                BannerBlock::class,
//            ]);
            return $fields;
        }

    }
}
