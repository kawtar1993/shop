<?php
include 'model/User.php';

class UserDAO{
	private static $db;

	public function __construct(){
		//connection to database
		 self::$db=Connection::getConnection('localhost','shop','root', '');
	}

	//create new user
	public function newUser(User $user){
		$req = self::$db->prepare('INSERT INTO users(nom,prenom,mail,password) values(:nom,:prenom,:mail,:password)');
        $result=$req->execute(array('nom' => $user->getNom(), 'prenom' => $user->getPrenom(),'mail' => $user->getMail(), 'password' => $user->getPassword()));
        return $result;
	}

	//get user
	public function getUser($mail){
		$req = self::$db->prepare('select id,nom,prenom,mail,password from users where mail=:mail');
        $req->execute(array('mail'=>$mail));
        $user="";
        while ($donnees = $req->fetch())
        {
	        $user=new User($donnees["nom"],$donnees["prenom"],$donnees["mail"]);
	        $user->setId($donnees["id"]);
	        $user->setPassword($donnees["password"]);
        }
        return $user;
	}
}
