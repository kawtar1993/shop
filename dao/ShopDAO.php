<?php
include 'model/Shop.php';

class ShopDAO{
	private static $db;

	public function __construct(){
		//connection to database
		 self::$db=Connection::getConnection('localhost','shop','root', '');
	}

	//get shops
	public function getShops($shopsLike){
		//if there is no preferred shops for the current user
		if(count($shopsLike)==0){
           $req = self::$db->query('select * from shops order by distance');
		}
		//if there is preferred shops for the current user
		else{
		  //select all the shops which is not included in the preferred shops of the user	
          $req = self::$db->prepare('select * from shops where id not in ( '.implode(',',$shopsLike).') order by distance');
          $req->execute();
		}
		
        $shops=[];
        while ($donnees = $req->fetch())
        {
	        $shop=new Shop($donnees["name"],$donnees["image"],$donnees["distance"]);
	        $shop->setId($donnees["id"]);
	        $shops[]=$shop;
        }
        return $shops;
	}
}
