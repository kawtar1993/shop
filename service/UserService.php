<?php

include 'dao/UserDAO.php';

class UserService{
	private $userDAO;

	public function __construct(){
         $this->userDAO=new UserDAO();
	}

	//create new user
	public function newUser($nom,$prenom,$mail,$password){
		$user=new User($nom,$prenom,$mail);
		$user->setPassword($password);
		return $this->userDAO->newUser($user);
	}

	//get user
	public function getUser($mail){
		return $this->userDAO->getUser($mail);
	}
}