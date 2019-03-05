<?php include('header.php');?>

<div id="blocSite">
	<table class="table table-striped">
		<caption id="titreListeTableau" class="tmid">Liste des articles</caption>
		<tr>
			<th class="tmid">Titre de l'article</th>
			<th class="tmid">Actions</th>
		</tr>
		<?php  foreach ($articles as $article) :?>
			<tr>
				<td><a class="adminPower" href="http://projet1.achesnel.fr/projet4/index.php?action=article&amp;id=<?= $article['id'] ?>">
					 <?= htmlspecialchars($article['title']) ?> </a> </td>
				 <td> <a href="http://projet1.achesnel.fr/projet4/index.php?action=modifierArticle&amp;id=<?= $article['id'] ?>"><i class="far fa-edit"></i></a>
				 <a class="adminPower" href="http://projet1.achesnel.fr/projet4/index.php?action=supprimerArticle&amp;id=<?= $article['id'] ?>"><i class="far fa-trash-alt"></i></a> </td>
			</tr>
		<?php endforeach;?> 
	</table>

	<a href="http://projet1.achesnel.fr/projet4/index.php?action=ajouterArticle"> Ajouter un article </a>
</div>
<?php include('footer.php');?>