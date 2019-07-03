<?php $title = 'Modification de chapitre'; ?>

<?php ob_start(); ?>

<div class="container" id="post_update_zone">
	<div class="row">
		<div class="col-lg-12">
			<div>
				<h2><?= htmlspecialchars($post['title']) ?></h2>
				<h3><em>le <?= $post['creation_date_fr'] ?></em></h3>
				<div class="container">
					<form action="index.php?action=update&amp;id=<?= $post['id'] ?>" method="post">
						<div class=row>
							<h1 class="admin_title">Modifier le chapitre</h1>
							<div class="col-lg-3">
								<p>
									<label for="posttitle">Titre</label> : <input type="text" name="posttitle" class="form-group" id="posttitle" value="<?= htmlspecialchars($post['title']) ?>">
								</p>
							</div>
							<div class="col-lg-12">
								<textarea name="updatecontent" id="updatecontent" class="form-group" value="">
										<?php echo strip_tags(nl2br(html_entity_decode($post['content']))) ?>
								</textarea>
								<div class="row" id="post_button">
									<input type="radio" name="publish" value="oui" id="publish" checked/><label for="oui">Publier</label>
									<input type="radio" name="publish" value="non" id="publish" /><label for="non">Ne pas publier</label>
									<button type="submit" class="btn btn-primary">Terminer l'édition</button>
								</div>
								
							</div>
						</div>
					</form>
					<div class="delete_buttons">
						<button class="btn btn-danger" id="delete_post_button" onclick="showConfirm()">
						Supprimer le chapitre</button>
						<button class="btn btn-success inactive" id="confirmDeleteButton">
							<a href="index.php?action=delete&amp;id=<?= $post['id'] ?>">Confirmer la suppression</a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>