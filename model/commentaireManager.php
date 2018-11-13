<?php  

class CommentaireManager
{
	
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

	public function getComments() {
		$db = $this->db;

		$req = $db->prepare('SELECT comment, comment_date, signalment, post_id FROM comments ORDER BY creation_date');
		$req->execute();

		$comments = $req->fetchAll(PDO::FETCH_ASSOC);
		return $comments;
	}
}