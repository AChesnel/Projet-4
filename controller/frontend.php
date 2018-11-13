<?php

require('model/articleManager.php');
require('model/userManager.php');
require('model/commentaireManager.php');

class FrontendArticles {

	public function displayHome()
	{
		require ('view/frontend/home.php');
	}

	public function contact()
	{
		require ('view/frontend/contact.php');
	}

	public function connexion()
	{
		if (isset ($_SESSION['logged']) && $_SESSION['logged'] == true) {
			header('location: index.php');
		} else {
			require ('view/frontend/connexion.php');
		}
	}

	public function deconnexion() {
		session_unset();
		header("location: index.php");
	}

	public function displayArticles()
	{
		$manager =new ArticleManager();
		$articles = $manager->getArticles();


		require ('view/frontend/pageArticles.php');
	}

	public function login()
	{
		if ($_POST['identifiant'] && $_POST['password']) {

			$identifiant = $_POST['identifiant'];
			$password    =	$_POST['password'];

			$manager = new UserManager();
			

			if($user = $manager->getUserByUsername($identifiant)) {
				// On compare le mot de passe envoyé à celui qui correspond au mot de passe de l'user
	 
				if($user['password'] === md5($password)) {
					$_SESSION['logged'] = true;
					$_SESSION['role'] = $user['role'];
					require ('view/frontend/home.php');
				}
		       return 'Utilisateur ou mot de passe incorrect';
			}
		} else {
			return 'Utilisateur ou mot de passe incorrect';
		}
	}

	public function page()
	{
		$manager =new ArticleManager();
		$article = $manager->getArticle($_GET['id']);
		$managerCommentaire = new CommentaireManager();
		$commentaires = $managerCommentaire->getComments();

		require ('view/frontend/article.php');
	}

	public function nouveauCompte()
	{
		require ('view/frontend/nouveauCompte.php');
	}

	public function createAccount()
	{
		$manager = new UserManager();

		$validation = $manager->hasPostDataValid($_POST);
		if ($validation == 1 ) {
			$identifiant = $_POST['identifiant'];
			$password    = password_hash($_POST['password'], PASSWORD_BCRYPT); 
			$prénom      = $_POST['prénom'];
			$nom         = $_POST['nom'];
			$email       = $_POST['email'];

			$compte = $manager->addAccount($identifiant, $password, $prénom, $nom, $email);

			require ('view/frontend/home.php');
		} else {
			echo $validation;
		}
	}

	public function espaceAdmin()
	{
		require ('view/frontend/espaceAdmin.php');
	}

	public function gestionArticles()
	{
		$manager =new ArticleManager();
		$articles = $manager->getArticles();

		require('view/frontend/gestionArticles.php');
	}

	public function modifierArticle()
	{
		require('view/frontend/modifierArticles.php');
	}

	public function supprimerArticle()
	{
		$manager =new ArticleManager();
		$article = $manager->deleteArticle($_GET['id']);

		require('view/frontend/articleSupprimeConfirme.php');
	}

	public function gestionUtilisateurs()
	{
		$manager =new UserManager();
		$utilisateurs = $manager->getUsers();

		require ('view/frontend/gestionUtilisateurs.php');
	}

	public function supprimerUtilisateur()
	{
		$manager = new UserManager();
		$utilisateur = $manager->deleteUser($_GET['id']);

		require('view/frontend/utilisateurSupprimeConfirme.php');
	}

	public function bannirUtilisateur()
	{
		$manager = new UserManager();
		$utilisateur = $manager->banUser($_GET['id']);

		require('view/frontend/utilisateurbanniConfirme.php');
	}

	public function rehabiliterUtilisateur()
	{
		$manager = new UserManager();
		$utilisateur = $manager->unBanUser($_GET['id']);

		require('view/frontend/utilisateurUnBanConfirme.php');
	}

	public function ajouterArticle()
	{
		require('view/frontend/ajouterArticle.php');
	}

	public function publierArticle()
	{
		$manager = new ArticleManager();

		$title   = $_POST['title'];
		$content = $_POST['content'];

		$article = $manager->publishArticle($title, $content);
		require ('view/frontend/espaceAdmin.php');
	}
}