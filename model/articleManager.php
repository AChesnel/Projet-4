<?php

/**
* class de type Manager
* Sert à Create Retrieve Update Delete les articles en BDD
*
*/
class ArticleManager {

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

	public function getArticles() {
		 $db = $this->db;

	    $req = $db->prepare('SELECT id, title, content, creation_date FROM posts ORDER BY publish_date');
	    $req->execute();

	    $datas = $req->fetchAll(PDO::FETCH_ASSOC); 

	    return $datas;
	}

	public function getArticlesPagination($depart, $articleParPage) {
		 $db = $this->db;

	    $req = $db->prepare('SELECT id, title, content, creation_date FROM posts ORDER BY publish_date ASC LIMIT '.$depart.', '.$articleParPage.'');
	    $req->execute();

	    $datas = $req->fetchAll(PDO::FETCH_ASSOC); 

	    return $datas;
	}

	public function combienDArticles() {
		$db = $this->db;

		$req = $db->prepare('SELECT id FROM posts');
		$req->execute();

		$datas = $req->fetchAll(PDO::FETCH_ASSOC); 
		$nombreTotalArticle = count($datas);

	    return $nombreTotalArticle;
	}

	public function getArticle($id) {

		$article = null;
		 $db = $this->db;

	    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
	    $req->execute(array($id));

	    $article = $req->fetch(PDO::FETCH_ASSOC); 
	    return $article;
	}

	public function selectDernierArticle() {
		$db = $this->db;

		$req = $db->prepare('SELECT * FROM posts ORDER BY publish_date DESC LIMIT 1');
		$req->execute();

		$data = $req->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

	public function deleteArticle($id) {
		$db = $this->db;

		$req = $db->prepare('DELETE FROM posts WHERE id = ?');
		$req->execute(array($id));
		$req = $db->prepare('DELETE FROM comments WHERE post_id = ?');
		$req->execute(array($id));
	}

	public function publishArticle($title, $content) {
		$db = $this->db;

		$req = $db->prepare("INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES (NULL, ?, ?, NOW());");
		$req->execute(array($title, $content));
		$article = $req->fetch(PDO::FETCH_ASSOC);
		return $article;
	}


	public function getComments($post_id, $order_by = 'ID DESC')
	{
	    $db = $this->db;


	    $req = $db->prepare('SELECT id, comment, author, signalement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = :post_id ORDER BY '. $order_by);
	    $req->bindValue(':post_id', $post_id, PDO::PARAM_INT);
	    $req->execute();
	    $comments = $req->fetchAll(PDO::FETCH_ASSOC);


	    return $comments;
	}

	
	public function editArticle($content, $title, $id) 
	{

		$db = $this->db;

		$req = $db->prepare('UPDATE `posts` SET `content` = ?, `title` = ? WHERE `posts` . `id` = ?');
		$req->execute(array($content, $title, $id));
		$article = $req->fetch(PDO::FETCH_ASSOC);
		return $article;
	}

	public function ajouterCommentaire($comment, $author, $post_id)
	{
		$db = $this->db;

		$query = "INSERT INTO comments SET 
												post_id 	 = :post_id,
												author 		 = :author, 
												comment 	 = :comment, 
												comment_Date = NOW(), 
												signalement  = 0;"; 

		$req = $db->prepare($query);
		$req->bindValue(':post_id', $post_id, PDO::PARAM_INT);
		$req->bindValue(':author', $author, PDO::PARAM_STR);
		$req->bindValue(':comment', $comment, PDO::PARAM_STR);
		$req->execute();
		$newComment = $req->fetch(PDO::FETCH_ASSOC);
		return $newComment;
	}

	public function deleteComment($id)
	{
		$db = $this->db;

		$req = $db->prepare('DELETE FROM comments WHERE id = ?');
		$req->execute(array($id));
		$req = $db->prepare('DELETE FROM comments_reported WHERE comment_id = ?');
		$req->execute(array($id));
	}

	public function reportComment($id)
	{
		$db = $this->db;

		$req = $db->prepare('UPDATE comments SET signalement = signalement + 1 WHERE comments . id = ?');
		$req->execute(array($id));
	}

	public function insertReport($id, $user_report)
	{
		$db = $this->db;

		$query = "INSERT INTO comments_reported SET 
													comment_id     = :id,
													user_report    = :user_report";
													
		$req = $db->prepare($query);
		$req->bindValue(':id', $id, PDO::PARAM_INT);
		$req->bindValue(':user_report', $user_report, PDO::PARAM_STR);
		$req->execute();
	}

	/**
	* Check if in comments_reported exists
	*@param $comment_id, $user_report
	*@return boolean
	*/
	public function isCommentReportExists($id, $user_report)
	{
		$db = $this->db;

		$req = $db->prepare("SELECT * FROM comments_reported WHERE comment_id = :id AND user_report = :user_report");
		$req->execute(array(':id' => $id, ':user_report' => $user_report));

		$checkResult = $req->fetch(PDO::FETCH_ASSOC); 

		if ($checkResult != '') {
			return true;
		} else {
			return false;
		}
	}

}