<?php

namespace {

    use SilverStripe\Bambusa\Controllers\SearchController;
    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\CMS\Search\SearchForm;
    use SilverStripe\Core\Environment;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\Form;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\TextField;
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
         * @return SearchForm
         */
        public function SearchForm(): SearchForm
        {
            $searchText = $this->owner->getRequest()->getVar('q');

            $fields = FieldList::create(
                TextField::create('q', false, $searchText)
            );
            $actions = FieldList::create(
                FormAction::create('results', _t('SilverStripe\\CMS\\Search\\SearchForm.GO', 'Go'))
            );

            $form = SearchForm::create($this->owner, SearchForm::class, $fields, $actions);
            $form->setFormAction(SearchController::singleton()->Link());
            $form->setTemplate('SearchForm_header');
            $form->addExtraClass('form-inline');
            return $form;
        }

        /**
         * @return SearchForm
         */
        public function HeaderSearchForm(): SearchForm
        {
            return $this->SearchForm()
                ->addExtraClass('d-none d-md-block header-search float-right');
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
