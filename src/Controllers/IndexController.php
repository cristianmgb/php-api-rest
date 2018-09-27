<?php 

namespace Cristianmgb\PhpApiRest\Controllers;

use Cristianmgb\PhpApiRest\Core\Utils\Util;
use Cristianmgb\PhpApiRest\Models\IndexModel;


/**
 * 
 */
class IndexController
{
	
	// protected $m;

	// public function __construct()
	// {
	// 	$m = new IndexModel();	
	// }

	public function index()
	{
		$m = new IndexModel();
		$r = $m->getNombres();
		// $r = $db->fetchRow('CALL spGetNombres ()');
		$data = array(
			'success' => 1,
			'errorCode' => 0,
			'message' => 'Wellcome to my api :)',
			'data' => $r		
		);

		Util::responseJson($data, 200);
		
	}



	
}