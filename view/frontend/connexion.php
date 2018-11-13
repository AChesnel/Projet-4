<?php include('header.php');?>
<div id="blocConnexion">
	<form action="index.php?action=login" method="post">

		<input type="text" name="identifiant" id="identifiant" placeholder="identifiant" required="required"> <br />
		<input type="password" name="password" id="password" placeholder="Mot de passe" required="required">

		<input type="submit">
	</form>

	<a href="http://localhost/projet4/index.php?action=nouveauCompte">Créer un compte</a>
</div>
<?php include('footer.php');?>