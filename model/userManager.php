<?php

class UserManager {



	private $db;

	public function __construct() {
		 try
	    {           
	     	$db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
	    }
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
	    $this->db = $db;
	}

	public function getUserByUsername($identifiant) {


		$db = $this->db;

	    $req = $db->prepare('SELECT * FROM users WHERE username = :username');
	    $req->execute(array(':username' => $identifiant));

	    $datas = $req->fetch(PDO::FETCH_ASSOC); 

	    return $datas;

	}

	public function getUserByEmail($email) {


		$db = $this->db;

	    $req = $db->prepare('SELECT * FROM users WHERE email = :email');
	    $req->execute(array(':email' => $email));

	    $datas = $req->fetch(PDO::FETCH_ASSOC); 

	    return $datas;

	}
	public function addAccount($identifiant, $password, $prénom, $nom, $email) {
		$db = $this->db;
		$req = $db->prepare("INSERT INTO `users` (`id`, `username`, `password`, `prenom`, `nom`, `email`, `role`) VALUES (NULL,?, ?, ?, ?, ?, 'user') ");
		$req->execute(array($identifiant, $password, $prénom, $nom, $email));

		$compte = $req->fetch(PDO::FETCH_ASSOC);
		return $compte;
	}
	public function hasPostDataValid($values)
    {

    	$user = $this->getUserByUsername($values['identifiant']);
    	if($user) {
    		return "Nom d'utilisateur déjà existant";
    	} 

    	$user = $this->getUserByEmail($values['email']);
    	if($user) {
    		return "E-mail déjà existant";
    	}

    	if ($values['password'] != $values['confirm']) {
    		return "Les mots de passe ne sont pas identiques";
    	}

    	return true;
    }

    	public function getUsers() {
		$db = $this->db;

	    $req = $db->prepare('SELECT id, username, email, nom, prenom, role FROM users ORDER BY role, username');
	    $req->execute();

	    $datas = $req->fetchAll(PDO::FETCH_ASSOC); 

	    return $datas;
	}

	public function deleteUser($id) {
		$db = $this->db;

		$req = $db->prepare('DELETE FROM users WHERE id = ?');
		$req->execute(array($id));
	}

	public function banUser($id) {
		$db = $this->db;

		$req = $db->prepare('UPDATE users SET role = "banni" WHERE id = ?');
		$req->execute(array($id));
	}

	public function unBanUser($id) {
		$db = $this->db;

		$req = $db->prepare('UPDATE users SET role = "user" WHERE id = ?');
		$req->execute(array($id));
	}
}
