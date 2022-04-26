<?php

namespace SilverStripe\Bambusa\Extensions;

use DNADesign\SilverStripeElementalDecisionTree\Model\DecisionTreeAnswer;
use SilverStripe\ORM\DataExtension;

/**
 * Extends {@see DecisionTreeAnswer}
 */
class DecisionTreeAnswerExtension extends DataExtension
{
    /**
     * @var string[]
     */
    private static $owns = [
        'ResultingStep',
    ];
}
