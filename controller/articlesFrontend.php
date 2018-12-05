<?php

require('model/articleManager.php');
require('model/commentaireManager.php');

class FrontendArticles {

	public function displayHome()
	{
		$manager =new ArticleManager();

		$dernierArticle = $manager->selectDernierArticle();

		require ('view/frontend/home.php');
	}

	public function displayArticles()
	{
		$manager =new ArticleManager();

		$articleParPage = 5;
		$nombreDArticles = $manager->combienDArticles();

		if(isset($_GET['page']) AND !empty($_GET['page'])) {
			$_GET['page'] = intval($_GET['page']);
			$pageActuelle = $_GET['page'];
		} else {
			$pageActuelle = 1;
		}
		
		$nextPage = $pageActuelle + 1;
		$previousPage = $pageActuelle -1;

		$maxPage = $nombreDArticles / $articleParPage;
		$maxPage = ceil($maxPage);

		if($nextPage > $maxPage) {
			$nextPage = $maxPage;
		}

		$depart = ($pageActuelle-1)*$articleParPage;

		$articles = $manager->getArticlesPagination($depart, $articleParPage);

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

			$articleID = $article['id'];
			$previousID = $articleID - 1;
			$nextID = $articleID +1;

			$minID = 1;
			$maxID = $manager->combienDArticles();

			if ($articleID == $maxID) {
				$nextID = $maxID;
			} elseif ($articleID == $minID) {
				$previousID = $minID;
			}

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

		header('location:index.php?action=gestionArticles');
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

		$manager = new ArticleManager();

		$verificationReport = $manager->isCommentReportExists($comment_id, $user_report);

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