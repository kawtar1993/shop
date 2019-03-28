<?php
include 'dao/DislikedshopDAO.php';

class DislikedshopService{

	private $shopDAO;

	public function __construct(){
         $this->shopDAO=new DislikedshopDAO();
	}

	//dislike shop
	public function dislikeShop($user_id,$shop_id){
        return $this->shopDAO->dislikeShop($user_id,$shop_id);
	}

	//get disliked shops under 2hours 
	public function getDislikeShop($user_id){
        return $this->shopDAO->getDislikeShop($user_id);
	}
}