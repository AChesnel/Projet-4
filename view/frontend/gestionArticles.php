<?php include('header.php');?>

<div id="blocSite">
	<table class="liste">
		<caption id="titreListeTableau">Liste des articles</caption>
		<tr>
			<th>Titre de l'article</th>
			<th>Actions</th>
		</tr>
		<?php  foreach ($articles as $article) :?>
			<tr>
				<td><a class="adminPower" href="http://localhost/projet4/index.php?action=article&amp;id=<?= $article['id'] ?>">
					 <?= htmlspecialchars($article['title']) ?> </a> </td>
				 <td> <a href="http://localhost/projet4/index.php?action=modifierArticle&amp;id=<?= $article['id'] ?>"><i class="far fa-edit"></i></a>
				 <a class="adminPower" href="http://localhost/projet4/index.php?action=supprimerArticle&amp;id=<?= $article['id'] ?>"><i class="far fa-trash-alt"></i></a> </td>
			</tr>
		<?php endforeach;?> 
	</table>

	<a href="http://localhost/projet4/index.php?action=ajouterArticle"> Ajouter un article </a>
</div>
<?php include('footer.php');?>