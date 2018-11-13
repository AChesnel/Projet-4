<?php include('header.php');?>

<div id="blocConnexion">
	<form action="index.php?action=createAccount" method="post">

		<input type="text" name="identifiant" id="identifiant" placeholder="Identifiant" required="required" maxlength="12" class="formInscription"><br />
		<input type="password" name="password" id="password" placeholder="Mot de passe" required="required" class="formInscription"><br />
		<input type="password" name="confirm" id="confirm" placeholder="Confirmation" required="required" class="formInscription"><br />
		<input type="text" name="prénom" id="prénom" placeholder="Prénom" required="required" maxlength="16" class="formInscription"><br />
		<input type="text" name="nom" id="nom" placeholder="Nom" required="required" maxlength="16" class="formInscription"><br />
		<input type="email" name="email" placeholder="E-mail" required="required" class="formInscription"> <br />
		<input type="submit">

	</form>
</div>

<?php include('footer.php');?>