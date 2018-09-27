<?php

namespace Cristianmgb\PhpApiRest\Core\DB;

use Dotenv\Dotenv;

/**
 * By Cristian Gonzalez @cmgb21
 */
class ConnectDB
{
	protected static $hostname;
    protected static $username;
    protected static $password; 
    protected static $db_name; 
    protected static $conn;
    protected static $instance; 
    
    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__ . '/../../..');
		$dotenv->load();
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		self::$hostname = getenv('DB_HOST');
        self::$username = getenv('DB_USER');
        self::$password = getenv('DB_PASS');
        self::$db_name  = getenv('DB_NAME');

		self::$conn = mysqli_connect(self::$hostname, self::$username, self::$password);
   
        if (!self::$conn)
        { 
            die('Critical Stop Error: Database Error<br />' . mysqli_error(self::$conn));
        }
        
        if(self::$db_name){
            $selected_db =  mysqli_select_db(self::$conn,self::$db_name);
            if(!$selected_db){
                die('Cant select database');
            }   
        }

    }

    public static function getInstance()
    {
    	return new ConnectDB();
    }

    public function query($sql, $return_last_insert_id = false)
    {
        $query = mysqli_query(self::$conn,$sql) OR die("Error: could not run query:".mysqli_error(self::$conn));
        
        if($return_last_insert_id){
                return  mysqli_insert_id(self::$conn); 
        }
        return $query;
      
    }

    public function fetchRow($sql)
    {
		$query = mysqli_query(self::$conn,$sql) OR die("Error: could not run query:".mysqli_error(self::$conn));
        $row = mysqli_fetch_assoc($query);

        return $row;
    }

    public function fetchAssoc($sql)
    {
        $result = mysqli_query(self::$conn,$sql ) OR die("Error: could not run query:".mysqli_error(self::$conn));
        
        $results = array();

        while($row=mysqli_fetch_assoc($result))
        {
            $results[]=$row;
        
        } 
        return $results;
    }
}
