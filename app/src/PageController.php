<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Core\Environment;
    use SilverStripe\View\ArrayData;
    use SilverStripe\View\Requirements;

    class PageController extends ContentController
    {
        protected function init()
        {
            parent::init();

            if (!$this->suppressModal()) {
                // Inject our privacy modal assets into the page
                Requirements::javascript('app/js/dialog.js', ['defer' => true]);
                Requirements::css('app/css/dialog.css');
            }

            Requirements::block('silverstripe/elemental-bannerblock:client/dist/styles/frontend-default.css');
        }

        /**
         * Content of the Modal window if our show modal is enabled.
         * @return \SilverStripe\ORM\FieldType\DBHTMLText|void
         */
        public function ModalWindow()
        {
            if (!$this->suppressModal()) {
                return ArrayData::create([])->renderWith('PrivacyModal');
            }
        }

        /**
         * When behat test are running we don't want the modal window getting in the way.
         * @return bool
         */
        private function suppressModal()
        {
            return !empty(Environment::getEnv('SS_BAMBUSA_SUPPRESS_MODAL'));
        }
    }
}
