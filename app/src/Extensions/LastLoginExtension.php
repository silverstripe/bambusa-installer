<?php
namespace SilverStripe\Bambusa\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\FieldType\DBDatetime;

/**
 * Track the last authentication of each user.
 */
class LastLoginExtension extends DataExtension
{

    private static $db = [
        'LastLogin' => 'Datetime'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName('LastLogin');
    }

    /**
     * Just before a member gets logged in (and its record gets written), set the LastLogin timestamp to now.
     */
    public function beforeMemberLoggedIn()
    {
        $owner = $this->getOwner();
        $owner->LastLogin = DBDatetime::now()->getValue();
    }
}
