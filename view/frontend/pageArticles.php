<?php include('header.php');?>

<div id="blocSite">
	<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
		<a href="http://localhost/projet4/index.php?action=ajouterArticle">Ajouter un article</a>
	<?php endif ?>
	<h1>Articles</h1>
		<div class="articles">
			<?php  foreach ($articles as $article) :?>
				<div id="bulleArticle">
				    	<h2 id="titrePageArticle"><?= htmlspecialchars($article['title']) ?></h2>
				    	<?= htmlspecialchars(substr($article['content'], 493,350)) ?> <a href="http://localhost/projet4/index.php?action=article&amp;id=<?= $article['id'] ?>">Lire la suite...</a>
				   
				</div>
			 <?php endforeach;?> 
	 	</div>
	 	<a href="http://localhost/projet4/index.php?action=pageArticles&page=<?= $previousPage?>">Page Précédente</a>
	 	<a href="http://localhost/projet4/index.php?action=pageArticles&page=<?= $nextPage ?>">Page suivante</a>
</div>

<?php include('footer.php');?>