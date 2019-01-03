<?php include('header.php');?>
<div id="blocSite">
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Utilisateur</th>
			<th>E-mail</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Role</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($utilisateurs as $utilisateur) :?>

			<tr>
				<td><?= htmlspecialchars($utilisateur['username']) ?></td>
				<td><?= htmlspecialchars($utilisateur['email']) ?></td>
				<td><?= htmlspecialchars($utilisateur['nom']) ?></td>
				<td><?= htmlspecialchars($utilisateur['prenom']) ?></td>
				<td><?= htmlspecialchars($utilisateur['role']) ?></td>
				<td>
					<?php if($utilisateur['role'] === "banni") : ?>
						<a class="adminPower" href="http://localhost/projet4/index.php?action=rehabiliterUtilisateur&amp;id=<?= $utilisateur['id'] ?>"><i class="fas fa-check-circle"></i>
						</a>
					
					<?php endif ?>
					<?php if($utilisateur['role'] === "user") : ?>
						<a class="adminPower" href="http://localhost/projet4/index.php?action=bannirUtilisateur&amp;id=<?= $utilisateur['id'] ?>"><i class="fas fa-times-circle"></i>
						</a>
					<?php endif;?>
					<?php if($utilisateur['role'] != "admin") : ?>
						<a class="adminPower" href="http://localhost/projet4/index.php?action=supprimerUtilisateur&amp;id=<?= $utilisateur['id'] ?>"><i class="far fa-trash-alt"></i>
						</a>
					<?php endif;?>
			    </td>

			</tr>

	<?php endforeach;?>
	</tbody>
	</table>
</div>
<?php include('footer.php');?>