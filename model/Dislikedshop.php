<?php

class Dislikedshop{
	private $id;
	private $user_id;
	private $shop_id;
	private $created_at;

	public function __construct($user_id,$shop_id){
         $this->user_id=$user_id;
         $this->shop_id=$shop_id;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getUser(){
		return $this->user_id;
	}

	public function setUser($user_id){
		$this->user_id=$user_id;
	}

	public function getShop(){
		return $this->shop_id;
	}

	public function setShop($shop_id){
		$this->shop_id=$shop_id;
	}

	public function getCreatedAt(){
		return $this->created_at;
	}

	public function setCreatedAt(){
		$this->created_at=now();
	}
}