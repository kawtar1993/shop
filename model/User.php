<?php

class User{
	private $id;
	private $nom;
	private $prenom;
	private $mail;
	private $password;

	public function __construct($nom,$prenom,$mail){
         $this->nom=$nom;
         $this->prenom=$prenom;
         $this->mail=$mail;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom=$nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom=$prenom;
	}

	public function getMail(){
		return $this->mail;
	}

	public function setMail($mail){
		$this->mail=$mail;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password=$password;
	}
}