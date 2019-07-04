<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Control\Cookie;
    use SilverStripe\Control\Director;
    use SilverStripe\Control\Session;
    use SilverStripe\Core\Environment;
    use SilverStripe\View\ArrayData;
    use SilverStripe\View\Requirements;

    class PageController extends ContentController
    {

        /**
         * Whether our modal should be showed on this request.
         * @var bool
         */
        private $showModal = false;

        protected function init()
        {
            parent::init();

            // Inject our privacy modal assets into the page
            $cookie = Cookie::get('privacy_modal_showed');
            if (empty($cookie)) {
                $this->showModal = true;
                Requirements::customScript('var privacy_modal_hostname=' . json_encode(Director::host()));
                Requirements::javascript('app/js/dialog.js', ['defer' => true]);
                Requirements::css('app/css/dialog.css');
            }
        }

        /**
         * Content of the Modal window if our show modal is enabled.
         * @return \SilverStripe\ORM\FieldType\DBHTMLText|void
         */
        public function ModalWindow()
        {
            if ($this->showModal) {
                return ArrayData::create([])->renderWith('PrivacyModal') ;
            }
        }
    }
}
