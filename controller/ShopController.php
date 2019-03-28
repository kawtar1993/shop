<?php

include 'service/ShopService.php';
include 'service/PreferredshopService.php';
include 'service/DislikedshopService.php';

class ShopController{

	private $shopService;
	private $preferredshopService;
	private $dislikedshopService;

	public function __construct(){
         $this->shopService=new ShopService();
         $this->preferredshopService=new PreferredshopService();
         $this->dislikedshopService=new DislikedshopService();
	}
    
    //get shops
	public function getShops($user_id){
		//get the preferred shops of the user
		$shops=$this->preferredshopService->getShops($user_id);
		$shopsdis=$this->dislikedshopService->getDislikeShop($user_id);
		$ids=[];
		foreach($shops as $shop){
			$ids[]=$shop->getId();
		}
		foreach($shopsdis as $shop){
			$ids[]=$shop->getId();
		}
		return $this->shopService->getShops($ids);
	}

	//get preferredshops
	public function getPreferredShops($user_id){
		return $this->preferredshopService->getShops($user_id);
	}

	//like shop
	public function createPreferredShop($user_id,$shop_id){
		return $this->preferredshopService->likeShop($user_id,$shop_id);
	}

	//dislike shop
	public function createDislikedShop($user_id,$shop_id){
		return $this->dislikedshopService->dislikeShop($user_id,$shop_id);
	}

	//remove shop from preferred shops
	public function removeShop($user_id,$shop_id){
		return $this->preferredshopService->removeShop($user_id,$shop_id);
	}
}