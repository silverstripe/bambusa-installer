<?php

namespace SilverStripe\Bambusa\Extensions;

use gorriecoe\Link\Models\Link;
use SilverStripe\Bambusa\Blocks\NavigationBannerBlock;
use SilverStripe\ORM\DataExtension;

/**
 * Extends {@see Link}
 */
class LinkExtension extends DataExtension
{
    /**
     * @var string[]
     */
    private static $has_one = [
        'NavigationBannerBlock' => NavigationBannerBlock::class,
    ];
}
