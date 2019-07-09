<?php


namespace SilverStripe\Bambusa\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{
    public function updateCMSFields(FieldList $fields)
    {
        $tabSet = $fields->fieldByName('Root');
        $tabSet->removeByName('VulcanSEO');
    }
}
