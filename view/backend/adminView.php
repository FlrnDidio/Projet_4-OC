<?php $title = 'Espace Admin'; ?>

<?php ob_start(); ?>

<div class="container">
	<form action="index.php?action=addPost" method="post">
		<div class=row>
			<h1>Ecrire un nouveau post</h1>
			<div class="col-lg-3">
				<p>
					<label for="title">Titre</label> : <input type="text" name="title" class="form-group" id="title" />
				</p>
			</div>
			<div class="col-lg-12">
				<textarea name="content" id="content" class="form-group"></textarea>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</div>
		</div>
	</form>
</div>




<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>