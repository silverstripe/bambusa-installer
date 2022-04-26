<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\CheckboxField;
    use SilverStripe\Forms\Tab;
    use SilverStripe\Forms\ToggleCompositeField;
    use SilverStripe\Forms\TreeMultiselectField;
    use SilverStripe\Taxonomy\TaxonomyTerm;

    class Page extends SiteTree
    {
        /**
         * @var string[]
         */
        private static $many_many = [
            'Terms' => TaxonomyTerm::class,
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName([
                'Terms',
                'ExtraMeta' // Not something we want users playing with
            ]);

            return $fields;
        }

        public function getSettingsFields()
        {
            $fields =  parent::getSettingsFields();

            $fields->addFieldToTab(
                'Root.Taxonomy',
                TreeMultiselectField::create(
                    'Terms',
                    _t(__CLASS__ . '.Terms', 'Terms'),
                    TaxonomyTerm::class
                )
            );

            return $fields;
        }

        /**
         * Fulltextsearch only consumes computed fields that begin with "get".
         *
         * @param string|null $action
         * @return string
         */
        public function getLink(?string $action = null): string
        {
            return $this->Link($action);
        }
    }
}
