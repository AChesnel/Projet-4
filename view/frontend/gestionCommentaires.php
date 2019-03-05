<?php include('header.php');?>

<div id="blocSite">
		<table class="table table-striped">
			<caption id="titreListeTableau" class="tmid">Liste des commentaires signalés</caption>
			<tr>
				<th class="tmid">Auteur</th>
				<th class="tmid">Commentaire</th>
				<th class="tmid">Article</th>
				<th class="tmid">Actions</th>
		</tr>
		<?php foreach ($reportedComments as $commentaire) :?>
			<tr class="trMid">
				<td><?= htmlspecialchars($commentaire['author']) ?></td>
				<td><?= htmlspecialchars($commentaire['comment']) ?></td>
				<td><?= htmlspecialchars($commentaire['post_id']) ?></td>
				<td>
					<a class="boutonSupprimer adminPower" href="http://projet1.achesnel.fr/projet4/index.php?action=supprimerCommentaireAdmin&amp;id=<?= $commentaire['id'] ?>"><i class="far fa-trash-alt"></i>
					</a>
					<a class="boutonSupprimer adminPower" href="http://projet1.achesnel.fr/projet4/index.php?action=approuverCommentaire&amp;id=<?= $commentaire['id'] ?>"><i class="fas fa-check-circle"></i></a>
				</td>
			</tr>
		<?php endforeach;?>
		</table>
</div>

<?php include('footer.php');?>