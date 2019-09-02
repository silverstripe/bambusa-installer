<?php

namespace SilverStripe\Bambusa\Extensions;

use SilverStripe\Core\Environment;
use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

/**
 * This isn't using sminnee/silverstripe-tagmanager because there's no way to embed
 * those tags in the CMS at the moment - see https://github.com/sminnee/silverstripe-tagmanager/issues/15.
 *
 * @property CMSMain|CMSPageEditController|LeftAndMainExtension $owner
 */
class LeftAndMainExtension extends Extension
{

    public function init()
    {
        $id = Environment::getEnv('SS_BAMBUSA_CMS_GOOGLE_ANALYTICS_ID');
        if (!$id) {
            return;
        }

        Requirements::javascript("https://www.googletagmanager.com/gtag/js?id={$id}", ['async' => true]);
        $js = <<<JS
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '{$id}');
JS;

        Requirements::customScript($js, 'bambusa-google-analytics');
    }
}
