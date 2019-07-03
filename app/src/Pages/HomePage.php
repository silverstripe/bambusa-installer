<?php

namespace SilverStripe\Bambusa\Pages;

use Page;

class HomePage extends Page
{
    private static $db = [

    ];

    private static $table_name = 'HomePage';

    private static $singular_name = 'HomePage';

    private static $plural_name = 'HomePages';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }
}
