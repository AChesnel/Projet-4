<?php include('header.php');?>
<div id="blocSite">
	<table id="liste" align="center">
		<caption id="titreListeTableau">Liste des utilisateurs</caption>
		<tr>
			<th>Utilisateur</th>
			<th>E-mail</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Rôle</th>
		</tr>
		<?php  foreach ($utilisateurs as $utilisateur) :?>

			<tr>
				<td><?= htmlspecialchars($utilisateur['username']) ?></td>
				<td><?= htmlspecialchars($utilisateur['email']) ?></td>
				<td><?= htmlspecialchars($utilisateur['nom']) ?></td>
				<td><?= htmlspecialchars($utilisateur['prenom']) ?></td>
				<td><?= htmlspecialchars($utilisateur['role']) ?></td>
				
				<?php if($utilisateur['role'] === "banni") : ?>
					<td>
						<a href="http://localhost/projet4/index.php?action=rehabiliterUtilisateur&amp;id=<?= $utilisateur['id'] ?>">Réhabiliter</a>
					</td>
				<?php endif;?>
				<?php if($utilisateur['role'] === "user") : ?>
					<td>
						<a href="http://localhost/projet4/index.php?action=bannirUtilisateur&amp;id=<?= $utilisateur['id'] ?>">Bannir</a>
					</td>
				<?php endif;?>
				
				<?php if($utilisateur['role'] != "admin") : ?>
					<td><a href="http://localhost/projet4/index.php?action=supprimerUtilisateur&amp;id=<?= $utilisateur['id'] ?>">Supprimer</a></td>
				<?php endif;?>

			</tr>

	<?php endforeach;?> 
	</table>
</div>