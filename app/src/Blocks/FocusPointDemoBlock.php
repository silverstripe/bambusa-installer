<?php


namespace SilverStripe\Bambusa\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;

class FocusPointDemoBlock extends BaseElement
{
    private static $icon = 'font-icon-image';

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];

    private static $table_name = 'FocusPointDemoBlock';

    private static $singular_name = 'FocusPoint demo';

    private static $plural_name = 'FocusPoint demo';

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
    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->Image()->exists() ? $this->Image()->Filename : 'No image attached';
    }

    /**
     * @return array
     */
    public function provideBlockSchema(): array
    {
        $schema = parent::provideBlockSchema();
        $schema['content'] = $this->getSummary();

        return $schema;
    }

    public function getType(): string
    {
        return _t(__CLASS__ . '.FOCUSPOINTDEMO', 'FocusPoint demo');
    }
}
