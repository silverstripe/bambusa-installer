<?php

namespace SilverStripe\Bambusa\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;

/**
 * Extension for {@see SiteConfig}
 *
 * @property string FacebookPage
 * @property string TwitterPage
 * @property string InstagramPage
 * @property string LinkedInPage
 */
class SocialsSiteConfigExtension extends DataExtension
{
    /**
     * @var string[]
     */
    private static $db = [
        'FacebookPage' => 'Text',
        'TwitterPage' => 'Text',
        'InstagramPage' => 'Text',
        'LinkedInPage' => 'Text',
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab(
            'Root.Socials',
            [
                TextField::create('FacebookPage', 'Facebook page')
                    ->setDescription('e.g https://www.facebook.com/{YourPage}'),
                TextField::create('TwitterPage', 'Twitter page')
                    ->setDescription('e.g https://www.twitter.com/{YourPage}'),
                TextField::create('InstagramPage', 'Instagram page')
                    ->setDescription('e.g https://www.instagram.com/{YourPage}'),
                TextField::create('LinkedInPage', 'LinkedIn page')
                    ->setDescription('e.g https://www.linkedin.com/{YourPage}'),
            ]
        );
    }
}
