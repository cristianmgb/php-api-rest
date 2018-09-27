<?php 

namespace Cristianmgb\PhpApiRest\Core;

use Zend\Diactoros\ServerRequestFactory;
use Aura\Router\RouterContainer;

/**
 * By Cristian Gonzalez @cmgb21
 */
class ManagerRouter 
{

    protected $request;
    protected $routerContainer;
    protected $map;

    public function __construct()
    {
        $this->request = $this->getRequest();
        $this->routerContainer = new RouterContainer();
		$this->map = $this->routerContainer->getMap();
                
    }

	private function getRequest () {
		return ServerRequestFactory::fromGlobals(
			$_SERVER,
			$_GET,
			$_POST,
			$_COOKIE,
			$_FILES
		);
	}


	public function router()
	{
		return $this->map;
	}


	public function manager()
	{
		$matcher = $this->routerContainer->getMatcher();
		$route = $matcher->match($this->request);
		//echo $this->request->getUri()->getPath() . "<br>";
		
		if (!$route) {
    
			ErrorApi::notFound();	


		} else {

			$handlerData = $route->handler;
			$controllerName = $handlerData['controller'];
			$actionName = $handlerData['action'];
			$controllerName = sprintf('%s\%s', 'Cristianmgb\PhpApiRest\Controllers', $controllerName);

			$controller = new $controllerName;
			$controller->$actionName($this->request);

		}
	}

}
