<?php 

namespace Cristianmgb\PhpApiRest\Core\Utils;

use Zend\Diactoros\Response\JsonResponse;
/**
 * by Cristian Gonzalez @cmgb21
 */
class Util 
{
    
   
    public function __construct()
    {
           
    }

    public static function responseJson($data, $status = 200)
    {
    	$response = new JsonResponse($data, $status, [ 'Content-Type' => ['application/json']]);

		foreach ($response->getHeaders() as $name => $values) {
		    foreach ($values as $value) {
		        header(sprintf('%s: %s', $name, $value), false);
		    }
		}
		http_response_code($response->getStatusCode());
		echo $response->getBody();
    }

    public static function verifyBodyRequest($request)
    {	
    	$contentTypeForm = "application/x-www-form-urlencoded";
    	$contentTypeJson = "application/json";

    	
        if ($request->getHeader('Content-Type')){

            $contentType = $request->getHeader('Content-Type')[0];

        	if ($contentTypeForm == $contentType) {

        		return $request->getParsedBody();

        	}else if ($contentTypeJson == $contentType){

        		return json_decode((string)$request->getBody());
        	}else {
        		// var_dump($request->getUploadedFiles()['fi']);
        		// var_dump($request->getParsedBody());

                
                var_dump(count($request->getHeader('Content-Type')));
        	}

        } else {

           return $request->getQueryParams(); 
        }
		
    }

    public static function createD()
    {
        mkdir("../../../../../public", 0777);
    }


}
