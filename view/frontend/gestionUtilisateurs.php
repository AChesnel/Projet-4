<?php include('header.php');?>
<div id="blocSite">
	<table class="liste">
		<caption id="titreListeTableau">Liste des utilisateurs</caption>
		<tr>
			<th>Utilisateur</th>
			<th>E-mail</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Role</th>
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
						<a class="adminPower" href="http://localhost/projet4/index.php?action=rehabiliterUtilisateur&amp;id=<?= $utilisateur['id'] ?>"><i class="fas fa-check-circle"></i></a>
					</td>
				<?php endif;?>
				<?php if($utilisateur['role'] === "user") : ?>
					<td>
						<a class="adminPower" href="http://localhost/projet4/index.php?action=bannirUtilisateur&amp;id=<?= $utilisateur['id'] ?>"><i class="fas fa-times-circle"></i></a>
					</td>
				<?php endif;?>
				
				<?php if($utilisateur['role'] != "admin") : ?>
					<td><a class="adminPower" href="http://localhost/projet4/index.php?action=supprimerUtilisateur&amp;id=<?= $utilisateur['id'] ?>"><i class="far fa-trash-alt"></i></a></td>
				<?php endif;?>

			</tr>

	<?php endforeach;?> 
	</table>
</div>
<?php include('footer.php');?>