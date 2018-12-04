<?php include('header.php');?>

<div id="blocSite">
	<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
		<a id="ajoutArticle" href="http://localhost/projet4/index.php?action=ajouterArticle">Ajouter un article <i class="fas fa-plus-circle"></i></a>
	<?php endif ?>
	<h1>Articles</h1>
		<div class="articles">
			<?php  foreach ($articles as $article) :?>
				<div id="bulleArticle">
				    	<a href="http://localhost/projet4/index.php?action=article&amp;id=<?= $article['id'] ?>"><h2 id="titrePageArticle"><?= htmlspecialchars($article['title']) ?></h2></a>

				    	<?= htmlspecialchars(substr($article['content'], 493,350)) ?> <a href="http://localhost/projet4/index.php?action=article&amp;id=<?= $article['id'] ?>">Lire la suite...</a>
				   
				</div>
			 <?php endforeach;?> 
	 	</div>
	 	<a class="pagePrecedente" href="http://localhost/projet4/index.php?action=pageArticles&page=<?= $previousPage?>"><i class="fas fa-arrow-alt-circle-left"></i> Page précédente</a>
	 	<a class="pageSuivante" href="http://localhost/projet4/index.php?action=pageArticles&page=<?= $nextPage ?>">Page suivante <i class="fas fa-arrow-alt-circle-right"></i></a>
</div>

<?php include('footer.php');?>