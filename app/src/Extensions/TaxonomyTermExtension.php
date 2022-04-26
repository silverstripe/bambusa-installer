<?php

namespace SilverStripe\Bambusa\Extensions;

use Page;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class TaxonomyTermExtension extends DataExtension
{
    private static $belongs_many_many = [
        'Pages' => Page::class,
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName([
            'Pages',
            'Choices',
        ]);
    }
}
