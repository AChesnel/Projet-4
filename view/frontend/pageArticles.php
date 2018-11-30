<?php include('header.php');?>

<div id="blocSite">
	<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
		<a href="http://localhost/projet4/index.php?action=ajouterArticle">Ajouter un article</a>
	<?php endif ?>
	<h1>Articles</h1>
		<div class="articles">
			<?php  foreach ($articles as $article) :?>
			    <a href="http://localhost/projet4/index.php?action=article&amp;id=<?= $article['id'] ?>">
			    	<?= htmlspecialchars($article['title']) ?>
			    </a> <br />
			 <?php endforeach;?> 
	 	</div>
	 	<a href="http://localhost/projet4/index.php?action=pageArticles&page=<?= $previousPage?>">Page Précédente</a>
	 	<a href="http://localhost/projet4/index.php?action=pageArticles&page=<?= $nextPage ?>">Page suivante</a>
</div>

<?php include('footer.php');?>