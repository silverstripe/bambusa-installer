<?php

namespace SilverStripe\Bambusa\Extensions;

use SilverStripe\Core\Environment;
use SilverStripe\Core\Extension;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;

/**
 * Display a modal on first page view to make sure the user is aware this is just a demo and not to
 * add personal information.
 */
class PrivacyWarningPopupExtension extends Extension
{

    public function onAfterInit()
    {
        if (!$this->suppressModal()) {
            // Inject our privacy modal assets into the page
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
