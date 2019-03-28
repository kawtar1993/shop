<?php
include 'dao/PreferredshopDAO.php';

class PreferredshopService{

	private $shopDAO;

	public function __construct(){
         $this->shopDAO=new PreferredshopDAO();
	}

	//like shop
	public function likeShop($user_id,$shop_id){
        return $this->shopDAO->likeShop($user_id,$shop_id);
	}

	//get preferred shops
	public function getShops($user_id){
		return $this->shopDAO->getShops($user_id);
	}

	//remove shop from the preferred shops
	public function removeShop($user_id,$shop_id){
		return $this->shopDAO->removeShop($user_id,$shop_id);
	}
}