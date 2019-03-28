<?php

class Shop{
	private $id;
	private $name;
	private $image;
	private $distance;

	public function __construct($name,$image,$distance){
         $this->name=$name;
         $this->image=$image;
         $this->distance=$distance;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name=$name;
	}

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image=$image;
	}

	public function getDistance(){
		return $this->distance;
	}

	public function setDistance($distance){
		$this->distance=$distance;
	}
}