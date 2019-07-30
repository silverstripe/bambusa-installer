<?php

namespace SilverStripe\Bambusa\Blocks\Column;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

class Item extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Item';

    /**
     * @var string
     */
    private static $table_name = 'ColumnItem';

    /**
     * @var array
     */
    private static $extensions = [
        Versioned::class
    ];

    /**
     * @var array
     */
    private static $db = [
        'Sort' => 'Int',
        'Content' => 'HTMLText',
    ];

    /**
     * @var array
     */
    private static $has_one = [
        'Parent' => MultiColumnBlock::class
    ];

    /**
     * @var array
     */
    private static $owned_by = [
        'Parent'
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'Content.Summary' => 'Content',
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Sort');
        $fields->removeByName('ParentID');
        $fields->addFieldToTab(
            'Root.Main',
            HTMLEditorField::create('Content', 'Content')
        );

        return $fields;
    }

    /**
     * @return Validator
     */
    public function getCMSValidator()
    {
        return RequiredFields::create([
            'Content'
        ]);
    }

    /**
     * Increment sort value
     */
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        if (!$this->Sort) {
            $this->Sort = static::get()->max('Sort') + 1;
        }
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
