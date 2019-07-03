<?php


namespace SilverStripe\Bambusa\Pages;

use JonoM\FocusPoint\Forms\FocusPointField;
use Page;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\LiteralField;

class ImagePage extends Page
{
    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];

    private static $table_name = 'ImagePage';

    private static $singular_name = 'Image page';

    private static $plural_name = 'Image pages';

    private static $description = 'A page that features an image upload with custom cropping';

    private static $icon_class = 'font-icon-image';

    public function getCMSFields()
    {
        $description = $this->Image()->exists()
                ? sprintf(
                    'To customise cropping, you can <a target="_blank" href="%s">edit this image</a>',
                    $this->Image()->CMSEditLink()
                )
                : null;
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab('Root.Main', [
            $upload = UploadField::create('Image')
                ->setDescription($description),
        ], 'Content');
        $upload->setAllowedFileCategories('image');
        return $fields;
    }
}
