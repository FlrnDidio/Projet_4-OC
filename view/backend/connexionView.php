<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
<div class="container">
	<form action="index.php?action=getLog" method="post" class="form-horizontal col-lg-6">
		<div class="form-group">
			<legend>Connexion</legend>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="pseudo" class="col-lg-2 control-label">Pseudo : </label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="pseudo">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="password" class="col-lg-2 control-label">Password : </label>
				<div class="col-lg-10">
					<input type="password" class="form-control" name="pass">
				</div>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" value="Se connecter" />
		</div>
	</form>
	<div class="row">
		<button><a href="index.php?action=showAdmin">Accès temporaire</a></button>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>