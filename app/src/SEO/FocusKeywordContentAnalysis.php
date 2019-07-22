<?php


namespace SilverStripe\Bambusa\SEO;

use Vulcan\Seo\Analysis\FocusKeywordContentAnalysis as BaseAnalysis;
use Vulcan\Seo\Seo;

class FocusKeywordContentAnalysis extends BaseAnalysis
{
    /**
     * @return string
     */
    public function getContentFromDom()
    {
        $content = Seo::collateContentFields($this->getPage());
        return strtolower(strip_tags($content ?: ''));
    }
}
