<?php include('header.php');?>

<div id="blocSite">
	<form action="index.php?action=editerArticle&amp;id=<?= $article['id'] ?>" method ="post">
		<h1 id="titreArticleCreation">Titre de l'article</h1>
		<input type="text" name="title" id="titreArticleInput" required="required" value="<?= $article['title'] ?>" >
		<textarea name="content" class="articleTiny"><?= $article['content'] ?></textarea>
		<input type="submit" id="editerArticle" value="Modifier">
	</form>


</div>

<script type="text/javascript">
    tinyMCE.init({
      mode : "textareas"
    });
</script>