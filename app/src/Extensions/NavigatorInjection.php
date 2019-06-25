<?php

namespace SilverStripe\Bambusa\Extensions;

use JonoM\BetterNavigator\Extension\BetterNavigatorExtension;
use SilverStripe\Core\Extension;
use SilverStripe\ORM\FieldType\DBHTMLText;

class NavigatorInjection extends Extension
{
    /**
     * @var string
     */
    private $navigatorHTML;

    /**
     * Prerender HTML to ensure that <% require %> gets loaded
     */
    public function beforeCallActionHandler(): void
    {
        $navigator = $this->owner->BetterNavigator();
        if ($navigator) {
            $this->navigatorHTML = $navigator->getValue();
        }
    }

    /**
     * @param $request
     * @param $action
     * @param DBHTMLText $result
     * @return DBHTMLText
     */
    public function afterCallActionHandler($request, $action, $result): DBHTMLText
    {
        $hasExtension = $this->owner->hasExtension(BetterNavigatorExtension::class);
        if (!$hasExtension || !$this->navigatorHTML) {
            return $result;
        }

        $html = $result->getValue();

        // Inject the NavigatorHTML before the closing </body> tag
        $html = preg_replace(
            '/(<\/body[^>]*>)/i',
            $this->navigatorHTML . '\\1',
            $html
        );
        $result->setValue($html);

        return $result;
    }
}
