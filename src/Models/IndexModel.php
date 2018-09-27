<?php

namespace Cristianmgb\PhpApiRest\Models;

use Cristianmgb\PhpApiRest\Core\DB\ConnectDB;

/**
 * By Cristian Gonzalez
 */
class IndexModel extends ConnectDB
{
   

    public function __construct()
    {
       self::getInstance();
    }

    public function getNombres($params='')
    {
    	return $this->fetchAssoc('CALL spGetNombres ()');
    }
}

