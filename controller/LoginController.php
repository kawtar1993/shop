<?php

include 'service/UserService.php';

class LoginController{

	private $userService;

	public function __construct(){
         $this->userService=new UserService();
	}
    
    //get user
	public function getUser($mail){
		return $this->userService->getUser($mail);
	}

	//create user
	public function createUser($nom,$prenom,$mail,$password){
		return $this->userService->newUser($nom,$prenom,$mail,$password);
	}
}