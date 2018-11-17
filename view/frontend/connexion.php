<?php include('header.php');?>
<div id="blocSite">
	<h1>Connexion</h1>
	<div id="backgroundBlocConnexion">
		<div id="blocConnexion">
			<form action="index.php?action=login" method="post">

				<input type="text" name="identifiant" id="identifiant" placeholder="Identifiant" required="required" class="elementForm">
				<input type="password" name="password" id="password" placeholder="Mot de passe" required="required" class="elementForm">
				<input type="submit" class="elementForm boutonEnvoyer">
			</form>
			
			<a href="http://localhost/projet4/index.php?action=nouveauCompte">Créer un compte</a>
		</div>
	</div>
</div>
<?php include('footer.php');?>