<?php $title = 'Error View';
ob_start(); ?>

<div class="container">
	<div class="row">
		<p>Une erreur s'est produite.</p>
		<a href="index.php">Retourner à l'accueil</a>
	</div>
</div>




<?php $content = ob_get_clean();
require('template.php'); ?>