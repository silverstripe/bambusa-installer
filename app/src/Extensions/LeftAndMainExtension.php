<?php

namespace SilverStripe\Bambusa\Extensions;

use SilverStripe\Core\Environment;
use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

/**
 * This isn't using sminnee/silverstripe-tagmanager because there's no way to embed
 * those tags in the CMS at the moment - see https://github.com/sminnee/silverstripe-tagmanager/issues/15.
 */
class LeftAndMainExtension extends Extension
{

    public function init()
    {
        $id = Environment::getEnv('SS_BAMBUSA_CMS_GOOGLE_ANALYTICS_ID');
        if (!$id) {
            return;
        }

        $js = <<<JS
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={$id}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{$id}');
</script>
JS;

        Requirements::customScript($js, 'bambusa-google-analytics');
    }
}
