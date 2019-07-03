<?php

namespace SilverStripe\Bambusa\Models;

use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FileHandleField;

class CarouselItem extends DataObject
{
    private static $table_name = 'CarouselItem';

    private static $extensions = [
        Versioned::class
    ];

    private static $versioned_gridfield_extensions = true;

    private static $db = [
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'SortOrder' => 'Int',
        'PrimaryCallToActionLabel' => 'Varchar(255)',
        'SecondaryCallToActionLabel' => 'Varchar(255)'
    ];

    private static $has_one = [
        'Parent' => SiteTree::class,
        'Image' => Image::class,
        'PrimaryCallToAction' => SiteTree::class,
        'SecondaryCallToAction' => SiteTree::class
    ];

    private static $owns = [
        'Image'
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
        'Title' => 'Title',
        'Content.FirstSentence' => 'Text',
        'PrimaryCallToAction.Title' => 'Primary CTA',
        'SecondaryCallToAction.Title' => 'Secondary CTA'
    ];

    private static $searchable_fields = [
        'Title',
        'Content'
    ];

    public function getCMSFields()
    {
        $fields = new FieldList(
            // Set title
            TextField::create('Title', 'Title', null, 255),
            // Content
            HtmlEditorField::create('Content')
                ->setRows(5)
                ->setDescription(
                    _t(
                        __CLASS__ . '.CONTENT_HELPTIP',
                        'Recommended: Use less than 50 words. For carousel slides, use a similar amount of content ' .
                        'as other items to ensure carousel height does not vary.'
                    )
                ),
            // Image
            Injector::inst()->create(FileHandleField::class, 'Image', 'Image')
                ->setAllowedFileCategories('image')
                ->setDescription(
                    _t(
                        __CLASS__ . '.IMAGE_HELPTIP',
                        'Recommended: Use high resolution images greater than 1600x900px.'
                    )
                ),
            // Call to actions
            TextField::create('PrimaryCallToActionLabel'),
            TreeDropdownField::create(
                'PrimaryCallToActionID',
                _t(__CLASS__ . '.PRIMARYCALLTOACTION', 'Primary Call To Action Link'),
                SiteTree::class
            ),
            TextField::create('SecondaryCallToActionLabel'),
            TreeDropdownField::create(
                'SecondaryCallToActionID',
                _t(__CLASS__ . '.SECONDARYCALLTOACTION', 'Secondary Call To Action Link'),
                SiteTree::class
            )
        );

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function canCreate($member = null, $context = array())
    {
        return $this->Parent()->canCreate($member);
    }

    public function canEdit($member = null)
    {
        return $this->Parent()->canEdit($member);
    }

    public function canDelete($member = null)
    {
        return $this->Parent()->canDelete($member);
    }

    public function canView($member = null)
    {
        return $this->Parent()->canView($member);
    }
}
