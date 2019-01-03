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
		        <?php if ($articlePrecedent) : ?>
		  			<a class="pagePrecedente" href="http://localhost/projet4/index.php?action=article&id=<?= $articlePrecedent['id']?>&direction=precedent">
			        	<i class="fas fa-arrow-alt-circle-left"></i>
			        	Page précédente
			        </a>
		   		<?php endif ?>
				<?php if ($articleSuivant) : ?>
			        <a class="pageSuivante" href="http://localhost/projet4/index.php?action=article&id=<?= $articleSuivant['id']?>&direction=suivant">
			        	Page suivante 
			        	<i class="fas fa-arrow-alt-circle-right"></i>
			        </a>
			    <?php endif ?>
		</div>
		<h2>Commentaires</h2>
		<div id="blocCommentaires">

			<?php if(isset($_SESSION['role']) && ($_SESSION['role']) === 'banni'): ?>
				Votre compte est suspendu, vous ne pouvez plus envoyer de commentaires.
			<?php elseif(isset($_SESSION['logged']) === true) : ?>
				<form action="index.php?action=envoyerCommentaire&amp;id=<?= $article['id'] ?>" method="post">
					<textarea name="commentaire" required="required"></textarea>
					<input type="submit" />
				</form>
			<?php elseif(isset($_SESSION['logged']) != true) : ?>
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
							<span id="<?= $commentaire['id'];?>" class="iconesCommentaire boutonSignaler">
								<i class="fas fa-minus-circle"></i>
							</span>
						<?php endif ?>
						<?php if(isset($_SESSION['role']) && ($_SESSION['role']) === 'admin') : ?>
							<a class="iconesCommentaire boutonSupprimer" href="http://localhost/projet4/index.php?action=supprimerCommentaire&amp;id=<?= $commentaire['id']?>&article=<?= $article['id'];?>">
								<i class="far fa-trash-alt"></i>
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
		$('.boutonSignaler').click(function() {
			
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
