<?php
include 'model/Dislikedshop.php';

class DislikedshopDAO{
	private static $db;

	public function __construct(){
		//connection to database
		 self::$db=Connection::getConnection('localhost','shop','root', '');
	}

	//dislike shop
	public function dislikeShop($user_id,$shop_id){
		$req = self::$db->prepare('insert into dislikedshops(user_id,shop_id,created_at) values(:user_id,:shop_id,now())');
		$result=$req->execute(array('user_id'=>$user_id,'shop_id'=>$shop_id));
        return $result;
	}

	//get disliked shops under 2hours 
	public function getDislikeShop($user_id){
		$req = self::$db->prepare('SELECT s.* FROM `dislikedshops` d left join shops s on d.shop_id=s.id WHERE TIMEDIFF(now(), created_at )<="02:00" and user_id=:user_id');
		$req->execute(array('user_id'=>$user_id));
		$shopsDislike=[];
		while ($donnees = $req->fetch())
        {
	        $shop=new Shop($donnees["name"],$donnees["image"],$donnees["distance"]);
	        $shop->setId($donnees["id"]);
	        $shopsDislike[]=$shop;
        }
        return $shopsDislike;
	}
}