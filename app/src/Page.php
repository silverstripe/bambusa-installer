<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;

    /**
 * Class \Page
 *
 */
    class Page extends SiteTree
    {
        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            // Not something we want users playing with.
            $fields->removeByName('ExtraMeta');

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
