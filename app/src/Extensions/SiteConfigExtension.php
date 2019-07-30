<?php


namespace SilverStripe\Bambusa\Extensions;

use SilverStripe\Colorpicker\Forms\ColorPickerField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{

    private static $db = [
        'BannerBlockColor' => 'Varchar(50)',
    ];

    private static $defaults = [
        'BannerBlockColor' => 'dark-orange'
    ];


    public function updateCMSFields(FieldList $fields)
    {
        $tabSet = $fields->fieldByName('Root');
        $tabSet->removeByName('VulcanSEO');

        $fields->insertBefore(
            'AccentColor',
            ColorPickerField::create(
                'BannerBlockColor',
                _t(
                    __CLASS__ . '.BannerBlockColor',
                    'Banner block color'
                ),
                $this->getOwner()->getThemeOptionsExcluding([
                    'light-grey',
                    'white',
                    'default-background',
                ])
            )->setDescription(
                _t(
                    __CLASS__ . '.BannerBlockColorDescription',
                    'Affects color of banner block.'
                )
            )
        );
    }
}
