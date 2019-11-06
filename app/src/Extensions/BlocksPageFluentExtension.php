<?php

namespace SilverStripe\Bambusa\Pages;

use SilverStripe\Core\Extension;
use TractorCow\Fluent\Model\Locale;

/**
 * Class \SilverStripe\Bambusa\Pages\BlocksPageFluentExtension
 *
 * @property BlocksPage|BlocksPageFluentExtension $owner
 */
class BlocksPageFluentExtension extends Extension
{
    /**
     * Override default Fluent fallback
     *
     * @param string $query
     * @param string $table
     * @param string $field
     * @param Locale $locale
     */
    public function updateLocaliseSelect(&$query, $table, $field, Locale $locale)
    {
        // disallow elemental data inheritance in the case that published localised page instance already exists
        $disallowedFields = ['ElementalAreaID', 'HeaderElementsID'];
        if (in_array($field, $disallowedFields) && $this->owner->isPublishedInLocale()) {
            $query = '"' . $table . '_Localised_' . $locale->getLocale() . '"."' . $field . '"';
        }
    }
}
