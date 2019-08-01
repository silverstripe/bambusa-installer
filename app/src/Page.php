<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\Tab;
    use SilverStripe\Forms\ToggleCompositeField;

    class Page extends SiteTree
    {
        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            // Not something we want users playing with.
            $fields->removeByName('ExtraMeta');

            return $fields;
        }
    }
}
