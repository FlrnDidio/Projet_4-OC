<?php $title = 'Connexion Public'; ?>

<?php ob_start(); ?>

<div class="container flex_content">
	<form action="index.php?action=getPublicLogIn" method="post" class="form-horizontal col-lg-7 col-md-10 col-sm-8 col-12">
		<div class="form-group">
			<legend>Connexion</legend>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="pseudo" class="col-lg-3 col-md-3 control-label">Pseudo : </label>
				<div class="col-lg-9 col-md-9">
					<input type="text" class="form-control" name="pseudo">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="password" class="col-lg-3 col-md-3 control-label">Mot de passe : </label>
				<div class="col-lg-9 col-md-9">
					<input type="password" class="form-control" name="pass">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Se connecter</button>
			</div>
		</div>
	</form>
</div>






<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>