<?php 

namespace Cristianmgb\PhpApiRest\Controllers;

use Cristianmgb\PhpApiRest\Core\Utils\Util;

/**
 * 
 */
class IndexController
{
	
	function __construct()
	{
		
	}

	public function index()
	{
		$data = array(
			'success' => 1,
			'errorCode' => 0,
			'message' => 'Wellcome to my api :)'			
		);

		Util::responseJson($data, 200);
	}



	
}