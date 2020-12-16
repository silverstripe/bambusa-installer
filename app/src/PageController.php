<?php

namespace {

    use SilverStripe\Bambusa\Controllers\SearchController;
    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\CMS\Search\SearchForm;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\TextField;
    use SilverStripe\View\Requirements;

    class PageController extends ContentController
    {
        protected function init()
        {
            parent::init();
            Requirements::block('silverstripe/elemental-bannerblock:client/dist/styles/frontend-default.css');
        }

        /**
         * @return SearchForm|null
         */
        public function SearchForm(): ?SearchForm
        {
            // Disabling search until we have the Infrastructure ready to serve it
            return null;

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
        public function HeaderSearchForm(): ?SearchForm
        {
            $form = $this->SearchForm();

            if ($form) {
                $form = $form->addExtraClass('d-none d-md-block header-search float-right');
            }

            return $form;
        }
    }
}
