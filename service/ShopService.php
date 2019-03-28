<?php

include 'dao/ShopDAO.php';

class ShopService{
	private $shopDAO;

	public function __construct(){
         $this->shopDAO=new ShopDAO();
	}

	//get shops
	public function getShops($shopsLike){
		return $this->shopDAO->getShops($shopsLike);
	}
}