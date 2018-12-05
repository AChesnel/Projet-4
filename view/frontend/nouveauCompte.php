<?php include('header.php');?>

<div id="blocSite">
	<div id="backgroundBlocInscription">
		<div id="blocInscription">
			<form action="index.php?action=createAccount" method="post">
				<?php if (isset($_SESSION['message'])) :?>
					<span id="messageErreurCompte"><?php echo $_SESSION['message']; unset($_SESSION['message']) ?></span>
				<?php endif; ?>
				<input type="text" name="identifiant" id="identifiant" placeholder="Identifiant" required="required" maxlength="12" class="elementForm">
				<input type="password" name="password" id="password" placeholder="Mot de passe" required="required" class="elementForm">
				<input type="password" name="confirm" id="confirm" placeholder="Confirmation" required="required" class="elementForm">
				<input type="text" name="prénom" id="prénom" placeholder="Prénom" required="required" maxlength="16" class="elementForm">
				<input type="text" name="nom" id="nom" placeholder="Nom" required="required" maxlength="16" class="elementForm">
				<input type="email" name="email" placeholder="E-mail" required="required" class="elementForm">
				<input type="submit" class="elementForm boutonEnvoyer">

			</form>
		</div>
	</div>
</div>

<?php include('footer.php');?>