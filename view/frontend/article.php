<?php include('header.php');?>

	<div id="blocSite">
		<div id="headerArticle">
			<img src="assets/images/imgArticle">
			<div id="overlayImgArticle">
				<h1 id="titreArticle"> <?= htmlspecialchars($article['title']) ?> </h1>
			</div>
		</div>
		<div id="blocArticle">
		        <?= ($article['content']) ?>
		        <div id="dateArticle">Écrit le : <?= htmlspecialchars($article['creation_date_fr']) ?></div>
		</div>
		<h2>Commentaires</h2>
		<div id="blocCommentaires">

			<?php if(isset($_SESSION['logged']) === true) : ?>
				<form action="index.php?action=envoyerCommentaire&amp;id=<?= $article['id'] ?>" method="post">
					<textarea name="commentaire" required="required"></textarea>
					<input type="submit" />
				</form>
			<?php else : ?>
				Veuillez vous connecter, ou vous inscrire pour pouvoir écrire un commentaire.
			<?php endif ?>
			<div id="listeCommentaires">
				<?php foreach ($comments as $commentaire) :?>
					<div class="commentaire">
						Commentaire de
						<span class="auteurCommentaire">
							<?= htmlspecialchars($commentaire['author']) ?>	
						</span>
						<?php if(isset($_SESSION['logged']) === true) : ?>
							<span id="<?= $commentaire['id'];?>" class="iconesCommentaire buttonSignaler">
								Signaler
							</span>
						<?php endif ?>
						<?php if(isset($_SESSION['role']) && ($_SESSION['role']) === 'admin') : ?>
							<a class="iconesCommentaire" href="http://localhost/projet4/index.php?action=supprimerCommentaire&amp;id=<?= $commentaire['id']?>&article=<?= $article['id'];?>">
								Supprimer
							</a>
						<?php endif ?>
						<br />
						le <span class="dateCommentaire"><?= htmlspecialchars($commentaire['comment_date_fr']) ?></span>
						<br />
						<div class="contenuCommentaire"><?= htmlspecialchars($commentaire['comment']) ?></div>
					</div>
				<?php endforeach;?>
			</div>
			<div id="message"></div>

		</div>
	</div>

	<script type="text/javascript">
		$('.buttonSignaler').click(function() {
			
				let id = $(this).attr('id');	

				$.ajax({
  							method : "POST",
  							url: "http://localhost/projet4/index.php?action=signalerCommentaire",
  							data: { comment_id: id }
							
						}).done(function(msg) {
  							
  									alert(msg);
  						});
		})
	</script>

<?php include('footer.php');?>