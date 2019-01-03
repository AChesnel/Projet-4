<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea', selector: "textarea.articleTiny"});</script>
  	<link href="http://fr.allfont.net/allfont.css?fonts=daisy-script" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Le blog de Jean Forteroche</title>
    <script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
</head>

<body>
	<header id="header">
		<div id="logoMenu"><a href="http://localhost/projet4">Menu</a></div>
		<div id="logoPrincipal"><a href="http://localhost/projet4">Le blog de Jean Forteroche</a></div>
			
			<nav>
				<div id=accueil class="contenuMenu"><a href="http://localhost/projet4">Accueil</a></div>
				<div class="contenuMenu"><a href="http://localhost/projet4/index.php?action=pageArticles">Articles</a></div>
				<div id="logoConnexion" class="contenuMenu">
					<?php if (isset ($_SESSION['logged'])) :?>
						<a href="http://localhost/projet4/index.php?action=deconnexion">Deconnexion</a>
					<?php else: ?>
						<a href="http://localhost/projet4/index.php?action=connexion">Connexion</a>
					<?php endif; ?>
					<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
						<a href="http://localhost/projet4/index.php?action=espaceAdmin">Espace administrateur</a>
					<?php endif ?>
				</div>
			</nav>
	</header>