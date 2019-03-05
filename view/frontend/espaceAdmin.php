<?php include('header.php');?>

<div id="blocSite">
	<a href="http://projet1.achesnel.fr/projet4/index.php?action=gestionArticles">Gestion des articles.</a> <br />
	<a href="http://projet1.achesnel.fr/projet4/index.php?action=gestionUtilisateurs">Gestion des utilisateurs.</a> <br />
	<a href="http://projet1.achesnel.fr/projet4/index.php?action=gestionCommentaires">Gestion des commentaires.</a>
	<?php if ($reportedComments != 0) : ?>

	<span id="cercleNotif">
		<?= $reportedComments ?>
	</span>
	
	<?php endif ?>
</div>
