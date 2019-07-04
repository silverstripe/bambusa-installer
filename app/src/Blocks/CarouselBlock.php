<?php


namespace SilverStripe\Bambusa\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldSortableHeader;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBHTMLText;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class CarouselBlock extends BaseElement
{
    private static $icon = 'font-icon-block-carousel';

    private static $inline_editable = false;

    private static $has_many = [
        'CarouselItems' => CarouselItem::class
    ];

    private static $owns = [
        'CarouselItems'
    ];

    private static $table_name = 'CarouselBlock';

    private static $singular_name = 'Carousel Block';

    private static $plural_name = 'Carousel Blocks';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->fieldByName('Root')->removeByName('CarouselItems');
        $gridField = GridField::create(
            'CarouselItems',
            _t(__CLASS__ . '.TITLE', 'Hero/Carousel'),
            $this->getCarouselItems(),
            GridFieldConfig_RelationEditor::create()
        );
        $gridField->setDescription(_t(
            __CLASS__ . '.NOTE',
            'NOTE: Carousel functionality will automatically be loaded when 2 or more items are added below'
        ));
        $gridConfig = $gridField->getConfig();
        $gridConfig->getComponentByType(GridFieldAddNewButton::class)->setButtonName(
            _t(__CLASS__ . '.ADDNEW', 'New slide')
        );
        $gridConfig->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
        $gridConfig->removeComponentsByType(GridFieldDeleteAction::class);
        $gridConfig->addComponent(new GridFieldDeleteAction());
        $gridConfig->addComponent(new GridFieldOrderableRows('SortOrder'));
        $gridConfig->removeComponentsByType(GridFieldSortableHeader::class);
        $gridField->setModelClass(CarouselItem::class);

        $fields->addFieldToTab('Root.Main', $gridField);

        $this->extend('updateCMSFields', $fields);
        return $fields;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        if ($this->getCarouselItems()->count() == 1) {
            $slide = ' slide';
        } else {
            $slide = ' slides';
        }
        return DBField::create_field('HTMLText', $this->getCarouselItems()->count() . $slide)->Summary(20);
    }

    /**
     * @return DataList
     */
    public function getCarouselItems()
    {
        return $this->owner->getComponents('CarouselItems')->sort('SortOrder');
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
        return _t(__CLASS__ . '.CAROUSEL', 'Carousel');
    }
}
