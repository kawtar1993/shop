<?php
//connection to the database
class Connection{
	private static $db;

	public static function getConnection($servername,$myDB,$username, $password){
	  try {
      if(self::$db==null){
        self::$db = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
         // set the PDO error mode to exception
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }
         return self::$db;
      }
      catch(PDOException $e)
      {
       die('Erreur : '.$e->getMessage());
      }
	}
}