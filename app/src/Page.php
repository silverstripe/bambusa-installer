<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\Tab;
    use SilverStripe\Forms\ToggleCompositeField;
    use Vulcan\Seo\Extensions\PageHealthExtension;
    use Vulcan\Seo\Extensions\PageSeoExtension;

    class Page extends SiteTree
    {
        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            /* @var Tab $mainTab */
            $mainTab = $fields->fieldByName('Root.Main');
            $seoTab = $fields->findOrMakeTab('Root.SEO');
            $replace = [
                'Metadata' => 'Meta tags',
                'SEOHealthAnalysis' => 'Analysis',
                'FacebookSeoComposite' => 'Facebook',
                'TwitterSeoComposite' => 'Twitter',
            ];
            foreach ($replace as $composite => $newTitle) {
                /* @var ToggleCompositeField $field */
                $field = $mainTab->fieldByName($composite);
                if (!$field) {
                    continue;
                }
                $seoTab->push($field);
                if ($newTitle) {
                    $field->setTitle($newTitle);
                }
                $mainTab->removeByName($field->getName());
            }

            return $fields;
        }
    }
}
