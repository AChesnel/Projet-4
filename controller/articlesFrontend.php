<?php

require('model/articleManager.php');
require('model/commentaireManager.php');

class FrontendArticles {

	public function displayHome()
	{
		require ('view/frontend/home.php');
	}

	public function displayArticles()
	{
		$manager =new ArticleManager();
		$articles = $manager->getArticles();


		require ('view/frontend/pageArticles.php');
	}

	public function page()
	{
		$manager =new ArticleManager();
		$article = $manager->getArticle($_GET['id']);

		if($article != null) {
		
			if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
			{
				$order_by = ' signalement desc';
			} else {
				$order_by = ' id desc ';
			}
			$comments = $manager->getComments($_GET['id'], $order_by);

			require ('view/frontend/article.php');

		} else {
			echo "404";
		}
	}

	public function gestionArticles()
	{
		$manager =new ArticleManager();
		$articles = $manager->getArticles();

		require('view/frontend/gestionArticles.php');
	}

	public function modifierArticle()
	{
		$manager = new ArticleManager();
		$article = $manager->getArticle($_GET['id']);

		require('view/frontend/modifierArticle.php');
	}

	public function editerArticle()
	{
		$manager = new ArticleManager();
		$article = $manager->getArticle($_GET['id']);

		$title   = $_POST['title'];
		$content = $_POST['content'];
		$id      = $article['id'];

		$article = $manager->editArticle($content, $title, $id);
		header('Location:index.php?action=espaceAdmin');
	}

	public function supprimerArticle()
	{
		$manager =new ArticleManager();
		$article = $manager->deleteArticle($_GET['id']);

		require('view/frontend/articleSupprimeConfirme.php');
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

		public function envoyerCommentaire()
	{
		$manager = new ArticleManager();

		$article = $manager->getArticle($_GET['id']);

		$comment = $_POST['commentaire'];
		$author  = $_SESSION['username'];
		$post_id = $article['id'];

		$newComment = $manager->ajouterCommentaire($comment, $author, $post_id);

		header('Location: index.php?action=article&id=' . $post_id);
	}

	public function supprimerCommentaire()
	{
		$manager = new ArticleManager();

		$article = $manager->getArticle($_GET['article']);

		$post_id    = $article['id'];
		$comment_id = $commentaire['id'];
		$comment    = $manager->deleteComment($_GET['id']);

		header('Location: index.php?action=article&id=' . $post_id);
	}

	public function signalerCommentaire()
	{

		$comment_id   = $_POST['comment_id'];
		$user_report  = $_SESSION['username'];

		echo $comment_id;

		//Aller dans la base de données et voir si le commentaire à déjà signalé.
		$manager = new ArticleManager();

		$verificationReport = $manager->isCommentReportExists($comment_id, $user_report);

		// Selon le retour de la fonction (True ou false), on saura si le commentaire à déjà été signalé par la même personne.

		if($verificationReport === true) {
			echo "Vous avez déjà signalé ce commentaire";
		} else {
			$reportComment = $manager->reportComment($comment_id);
			$insertReport  = $manager->insertReport($comment_id, $user_report);
		}

		exit;
		

		$article = $manager->getArticle($_GET['article']);
		$post_id = $article['id'];
		header('Location: index.php?action=article&id=' . $post_id);
	}
}