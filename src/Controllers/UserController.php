<?php

namespace Cristianmgb\PhpApiRest\Controllers;

use Cristianmgb\PhpApiRest\Core\Utils\Util;

/**
 * summary
 */
class UserController 
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getUser($request)
	{
		//var_dump((string)$request->getBody());
		$data = Util::verifyBodyRequest($request);
		var_dump($data);
		//echo(count($request->getParsedBody()));
	}

	public function params($request)
	{
		$data = Util::verifyBodyRequest($request);
		var_dump($data);
	}
}
