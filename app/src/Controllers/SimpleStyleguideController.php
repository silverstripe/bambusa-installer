<?php

namespace SilverStripe\Controllers;

use BenManu\SimpleStyleguide\SimpleStyleguideController as BenSimpleStyleguideController;
use SilverStripe\CMS\Controllers\ModelAsController;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\View\Requirements;
use SilverStripe\Subsites\Model\Subsite;

/**
 * Overrides `BenManu\SimpleStyleguide\SimpleStyleguideController` so we can allow non-dev users to access the style
 * guide.
 */
class SimpleStyleguideController extends BenSimpleStyleguideController
{

    private static $url_segment = 'styleguide';

    /**
     * @note This function was copied from BenSimpleStyleguideController. We commented-out the access control logic so
     * all users can see the Style guide all the time.
     * @return \SilverStripe\ORM\FieldType\DBHTMLText
     */
    public function index()
    {
        // This block was in the original SimpleStyleguideController
        //if (!Director::isDev() && !Permission::check('ADMIN')) {
        //    return Security::permissionFailure();
        //}

        // If the subsite module is installed then set the theme based on the current subsite
        if (class_exists('Subsite') && Subsite::currentSubsite()) {
            Config::inst()->update('SSViewer', 'theme', Subsite::currentSubsite()->Theme);
        }

        // TODO Remove after merging https://github.com/benmanu/silverstripe-simple-styleguide/pull/13
        $page = Injector::inst()->create(SiteTree::class);
        $controller = ModelAsController::controller_for($page);
        $controller->init();

        // requirements
        Requirements::css('benmanu/silverstripe-simple-styleguide: css/styleguide.css');
        Requirements::javascript('benmanu/silverstripe-simple-styleguide: js/styleguide.js');

        return $controller
            ->customise($this->getStyleGuideData())
            ->renderWith(['SimpleStyleguideController', 'Page']);
    }
}
