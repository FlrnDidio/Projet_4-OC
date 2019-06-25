<?php $title = 'Inscription'; ?>

<? ob_start(); ?>

<div class="container flex-content">
	<form action="index.php?action=getSignIn" method="post" class="form-horizontal col-lg-7 col-md-10 col-sm-8 col-12" id="public_login_form">
		<div class="form-group">
			<legend>Inscription</legend>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="email" class="col-lg-3 col-md-2 control-label">E-mail : </label>
				<div class="col-lg-9 col-md-10">
					<input type="text" class="form-control" name="email">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="pseudo" class="col-lg-3 col-md-2 control-label">Pseudo : </label>
				<div class="col-lg-9 col-md-10">
					<input type="text" class="form-control" name="pseudo">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="pass_1" class="col-lg-3 col-md-2 control-label">Mot de passe : </label>
				<div class="col-lg-9 col-md-10">
					<input type="password" class="form-control" name="pass_1">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="pass_2" class="col-lg-3 col-md-2 control-label">Confirmer mot de passe : </label>
				<div class="col-lg-9 col-md-10">
					<input type="password" class="form-control" name="pass_2">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<button type="submit" class="btn btn-primary public_login_button">S'inscrire</button>
			</div>
		</div>
	</form>
</div>






<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>