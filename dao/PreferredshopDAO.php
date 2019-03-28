<?php
include 'model/Preferredshop.php';

class PreferredshopDAO{
	private static $db;

	public function __construct(){
		//connection to database
		 self::$db=Connection::getConnection('localhost','shop','root', '');
	}

	//like shop
	public function likeShop($user_id,$shop_id){
		$req = self::$db->prepare('insert into preferredshops(user_id,shop_id) values(:user_id,:shop_id)');
		$result=$req->execute(array('user_id'=>$user_id,'shop_id'=>$shop_id));
        return $result;
	}

	//remove shop from the preferred shops
	public function removeShop($user_id,$shop_id){
		$req = self::$db->prepare('delete from preferredshops where user_id=:user_id and shop_id=:shop_id');
		$result=$req->execute(array('user_id'=>$user_id,'shop_id'=>$shop_id));
        return $result;
	}

	//get preferred shops
	public function getShops($user_id){
		$req = self::$db->prepare('select s.* from preferredshops p left join shops s on p.shop_id=s.id where user_id=:user_id order by distance');
		$req->execute(array('user_id'=>$user_id));
        $shopsLike=[];
        while ($donnees = $req->fetch())
        {
	        $shop=new Shop($donnees["name"],$donnees["image"],$donnees["distance"]);
	        $shop->setId($donnees["id"]);
	        $shopsLike[]=$shop;
        }
        return $shopsLike;
	}
}