<?php

use SilverStripe\Security\PasswordValidator;
use SilverStripe\Security\Member;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\CMS\Model\SiteTree;
use Symbiote\AdvancedWorkflow\Extensions\WorkflowApplicable;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
// Settings are registered via Injector configuration - see passwords.yml in framework
Member::set_password_validator($validator);
$formats =  [
    [
        'title' => 'Lead text (bigger)',
        'selector' => 'p',
        'classes' => 'lead',
    ],
    [
        'title' => '“Quote”',
        'selector' => 'p',
        'classes' => 'quote',
    ],
    [
        'title' => 'Button',
        'selector' => 'a',
        'classes' => 'btn btn-primary',
    ],
];
TinyMCEConfig::get('cms')
    ->setOptions([
        'body_class' => '',
        'importcss_append' => true,
        'style_formats' => $formats,
        'importcss_selector_filter' => ' ', // hide all selectors
    ])
    ->insertButtonsAfter('formatselect', 'styleselect');
