<?php include('header.php');?>

<div id="blocSite">
	<form action="index.php?action=publierArticle" method ="post">
		<h1 id="titreArticleCreation">Titre de l'article</h1>
		<input type="text" name="title" id="titreArticleInput" required="required">
		<textarea name="content" class="articleTiny"></textarea>
		<input type="submit" id="envoyerArticle">
	</form>
	
</div>