<?php

namespace SilverStripe\Bambusa\Blocks;

use SilverStripe\Assets\Image;
use SilverStripe\Assets\Upload_Validator;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FileHandleField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

/**
 * Class \SilverStripe\Bambusa\Blocks\CarouselItem
 *
 * @property int $Version
 * @property string $Title
 * @property string $Content
 * @property int $SortOrder
 * @property string $PrimaryCallToActionLabel
 * @property string $SecondaryCallToActionLabel
 * @property int $ParentID
 * @property int $ImageID
 * @property int $PrimaryCallToActionID
 * @property int $SecondaryCallToActionID
 * @method CarouselBlock Parent()
 * @method Image Image()
 * @method SiteTree PrimaryCallToAction()
 * @method SiteTree SecondaryCallToAction()
 * @mixin Versioned
 * @mixin FluentVersionedExtension
 */
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
        'Parent' => CarouselBlock::class,
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

    private static $default_sort = 'SortOrder ASC';

    /**
     * @config
     * @var int
     */
    private static $min_slide_width = 1600;

    /**
     * @config
     * @var int
     */
    private static $min_slide_height = 900;

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
                        'Recommended: Use high resolution images greater than {size}.',
                        [
                            'size' => sprintf(
                                '%sx%s',
                                static::config()->min_slide_width,
                                static::config()->min_slide_height
                            )
                        ]
                    )
                )
                ->setValidator(new class extends Upload_Validator
                {
                    public function validate()
                    {
                        $result = parent::validate();
                        $path = $this->tmpFile['tmp_name'];
                        list ($width, $height) = getimagesize($path);
                        $minWidth = CarouselItem::config()->min_slide_width;
                        $minHeight = CarouselItem::config()->min_slide_height;

                        if ($width < $minWidth) {
                            $this->errors[] = _t(
                                CarouselItem::class . 'ERROR_IMAGE_WIDTH',
                                // Note: this is abbreviated because the UI truncates the error message
                                'Min width: {size}px',
                                ['size' => $minWidth]
                            );
                            return false;
                        }
                        if ($height < $minHeight) {
                            $this->errors[] = _t(
                                CarouselItem::class . 'ERROR_IMAGE_HEIGHT',
                                // Note: this is abbreviated because the UI truncates the error message
                                'Min height {size}px',
                                ['size' => $minHeight]
                            );
                            return false;
                        }

                        return $result;
                    }
                }),
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
