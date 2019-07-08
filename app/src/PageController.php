<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\View\ArrayData;
    use SilverStripe\View\Requirements;

    class PageController extends ContentController
    {
        protected function init()
        {
            parent::init();
            // Inject our privacy modal assets into the page
            Requirements::javascript('app/js/dialog.js', ['defer' => true]);
            Requirements::css('app/css/dialog.css');
        }

        /**
         * Content of the Modal window if our show modal is enabled.
         * @return \SilverStripe\ORM\FieldType\DBHTMLText|void
         */
        public function ModalWindow()
        {
            return ArrayData::create([])->renderWith('PrivacyModal');
        }
    }
}
