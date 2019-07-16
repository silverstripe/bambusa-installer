<?php

namespace SilverStripe\Controllers;

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\HTTPResponse;
use SilverStripe\ORM\Queries\SQLSelect;
use SilverStripe\Security\Member;

/**
 * Controller that displays the last login time of any user ... or null if no login has ever occurred.
 *
 * This is used by SilverStripe.com to determine if a user has logged in recently and if the expiry date should be
 * extended.
 */
class LastLogin extends Controller
{

    public function index(HTTPRequest $request)
    {
        $lastLogin = SQLSelect::create()
            ->setFrom(Member::singleton()->baseTable())
            ->aggregate('MAX("LastLogin")', 'LastLogin')
            ->execute()
            ->value();

        $response = new HTTPResponse();
        return $response
            ->setBody(json_encode(['lastLogin' => $lastLogin]))
            ->addHeader('content-type', 'application/json');
    }


}
