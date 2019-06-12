<?php $title = 'Contact'; ?>

<?php ob_start(); ?>

<div class="container d-flex justify-content-center">

	
	<form class="d-flex justify-content-center form-horizontal well col-lg-9" id="contactform"  action="index.php?action=" method="post">
		<div class="form-group">
			<legend>Me contacter</legend>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="email" class="col-form-label col-lg-2 col-sm-3">E-mail : </label>
				<div class="col-lg-4 col-sm-4">
					<input type="text" class="form-control" id="email">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="message" class="col-form-label col-lg-2 col-sm-3">Votre message : </label>
				<div class="col-lg-6 col-sm-6">
					<textarea class="form-control form-control-lg" id="messagearea" rows="7"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<button type="submit" class="btn pull-right btn-primary" id="contactbutton">Envoyer</button>
			</div>
		</div>
	</form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>