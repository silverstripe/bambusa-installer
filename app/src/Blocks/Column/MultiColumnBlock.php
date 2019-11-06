<?php


namespace SilverStripe\Bambusa\Blocks\Column;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Shared\Models\ContentItem;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class \SilverStripe\Bambusa\Blocks\Column\MultiColumnBlock
 *
 * @method DataList|Item[] Items()
 */
class MultiColumnBlock extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'font-icon-columns';

    /**
     * @var string
     */
    private static $table_name = 'MultiColumnBlock';
    /**
     * @var string
     */
    private static $singular_name = 'Multi-column';

    /**
     * @var string
     */
    private static $plural_name = 'Multi-column blocks';

    /**
     * @var string
     */
    private static $description = 'Multiple column blocks';

    /**
     * @var bool
     */
    private static $inline_editable = false;

    /**
     * @var array
     */
    private static $has_many = [
        'Items' => Item::class
    ];

    /**
     * @var array
     */
    private static $owns = [
        'Items'
    ];

    private static $cascade_duplicates = [
        'Items'
    ];

    /** @var int The max number of columns for each row. */
    private static $max_columns = 3;

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Items');
        $fields->addFieldToTab(
            'Root.Main',
            GridField::create(
                'Items',
                'Items',
                $this->Items(),
                $config = GridFieldConfig_RecordEditor::create()
            )
        );

        $config->addComponent(GridFieldOrderableRows::create());

        return $fields;
    }

    public function gridSize(): int
    {
        $count = $this->Items()->count();
        $maxColumns = static::config()->get('max_columns');
        if ($count >= $maxColumns) {
            return $maxColumns;
        } else {
            return $count;
        }
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return static::$singular_name;
    }
}
