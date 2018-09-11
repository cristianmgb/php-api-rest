<?php 

namespace Cristianmgb\PhpApiRest\Core;

use Cristianmgb\PhpApiRest\Core\Utils\Util;

/**
 * By Cristian Gonzalez @cmgb21
 */
class ErrorApi
{
    
    public function __construct()
    {
       
    }

    public static function notFound()
	{
		$data = array(
			"success" => 0,
			"errorCode" => 404,
			"message" => "No found"
		);

		Util::responseJson($data, 404);
	}

	
}
