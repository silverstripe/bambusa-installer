<?php

namespace SilverStripe\Bambusa\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use gorriecoe\Link\Models\Link;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\Validator;
use SilverStripe\ORM\HasManyList;

/**
 * A block with a title and a grid of navigation items to help orient users
 *
 * @property string $Title
 * @property string $ForeTitle
 * @property string $Subtitle
 * @property int $ItemsPerRow
 * @method Image BackgroundImage()
 * @method HasManyList|Link[] Items()
 */
class NavigationBannerBlock extends BaseElement
{
    /**
     * @var string
     */
    private static $table_name = 'NavigationBannerBlock';

    /**
     * @var string
     */
    private static $icon = 'font-icon-block-layout-5';

    /**
     * @var bool
     */
    private static $inline_editable = false;

    /**
     * @var string
     */
    private static $singular_name = 'Navigation Banner Block';

    /**
     * @var string
     */
    private static $plural_name = 'Navigation Banner Blocks';

    /**
     * @var string[]
     */
    private static $db = [
        'Title' => 'Varchar',
        'ForeTitle' => 'HTMLText',
        'Subtitle' => 'HTMLText',
        'ItemsPerRow' => "Enum('3, 4')",
    ];

    /**
     * @var string[]
     */
    private static $has_one = [
        'BackgroundImage' => Image::class,
    ];

    /**
     * @var string[]
     */
    private static $has_many = [
        'Items' => Link::class,
    ];

    /**
     * @var string[]
     */
    private static $owns = [
        'BackgroundImage',
        'Items',
    ];

    /**
     * @var string[]
     */
    private static $cascade_duplicates = [
        'BackgroundImage',
        'Items',
    ];

    /**
     * @var string[]
     */
    private static $cascade_deletes = [
        'BackgroundImage',
        'Items',
    ];

    /**
     * @return string
     */
    public function getType(): string
    {
        return _t(__CLASS__ . '.NAVIGATION_BANNER', 'NavigationBanner');
    }

    /**
     * @return Validator
     */
    public function getCMSValidator()
    {
        return RequiredFields::create([
            'Title'
        ]);
    }

    /**
     * e.g col-md-4
     *
     * @return string
     */
    public function getBootstrapItemColumnClassNames()
    {
        $classNames = [
            sprintf('col-lg-%s', 12/$this->ItemsPerRow),
        ];

        return implode(' ', $classNames);
    }
}
