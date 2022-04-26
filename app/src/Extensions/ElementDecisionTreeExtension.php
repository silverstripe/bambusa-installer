<?php

namespace SilverStripe\Bambusa\Extensions;

use DNADesign\SilverStripeElementalDecisionTree\Model\ElementDecisionTree;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\FieldType\DBEnum;

/**
 * Extends {@see ElementDecisionTree}
 */
class ElementDecisionTreeExtension extends DataExtension
{
    /**
     * @var string[]
     */
    private static $db = [
        'Layout' => 'Enum("Single, Multiple")',
    ];

    /**
     * @var string[]
     */
    private static $owns = [
        'FirstStep',
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        // Layout field

        /** @var DBEnum $layoutDbField */
        $layoutDbField = $this->getOwner()->dbObject('Layout');

        $layoutField = DropdownField::create('Layout', null, $layoutDbField->enumValues())
            ->setDescription(
                'Choose whether the decision sequence appears in the same view or across multiple views'
            );

        $fields->addFieldToTab('Root.Main', $layoutField);
    }
}
