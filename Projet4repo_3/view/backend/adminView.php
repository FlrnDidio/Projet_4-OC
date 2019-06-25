<?php
 	$title = 'Espace Admin';
 	ob_start(); ?>

<div class="container" id="write_post_zone">
	<form action="index.php?action=addPost" method="post">
		<div class=row>
			<h1 class="admin_title">Ecrire un nouveau chapitre</h1>
			<div class="col-lg-3">
				<p>
					<label for="posttitle">Titre</label> : <input type="text" name="posttitle" class="form-group" id="posttitle" />
				</p>
			</div>
			<div class="col-lg-12">
				<textarea name="postcontent" id="postcontent" class="form-group"></textarea>
				<div class="row" id="post_button">
					<input type="radio" name="publish" value="yes" id="publish" checked/><label for="yes">Publier</label>
					<input type="radio" name="publish" value="no" id="publish" /><label for="no">Ne pas publier</label>
					<button type="submit" class="btn btn-primary">Envoyer</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="container">
	<h2>Derniers chapitres publiés</h2><br/>
	<?php 
	while ($data = $posts->fetch())
	{
	?>
		<div id="admin_post_block">
			<div class="row flex_content">
				<h4><em>le <?= $data['creation_date_fr'] ?></em></h4>
				<h3 class="post_title"><?= htmlspecialchars($data['title']) ?></h3>
				<p>
					<?= strip_tags(html_entity_decode($data['content'])) ?>
					<br />
				</p>
			</div>
			<div class="row" id="admin_post_button">
				<button class="btn btn-primary btn_show_comments"><a href="index.php?action=showAdminComments&amp;id=<?= $data['id'] ?>">Afficher les commentaires</a></button>
				<button class="btn btn-primary btn_modify_post"><a href="index.php?action=showUpdatePost&amp;id=<?= $data['id']?>">Modifier le chapitre</a></button>
			</div>
		</div>	
	<?php 
	}
	$posts->closeCursor();
	?>
</div>


<div class="container">
	<h2>Derniers chapitres non-publiés</h2><br/>
	<?php 
	while ($data = $almostposts->fetch())
	{
	?>
		<div class="container">
			<h3>
				<?= htmlspecialchars($data['title']) ?>
				<em>le <?= $data['creation_date_fr'] ?></em>
			</h3>

			<p>
				<?= nl2br(htmlspecialchars($data['content'])) ?>
				<br />
			</p>

			<div class="container">
				<button class="btn btn-primary btn_modify_post"><a href="index.php?action=showUpdatePost&amp;id=<?= $data['id']?>">Modifier le chapitre</a></button>
			</div>

		</div>	
	<?php 
	}
	$posts->closeCursor();
	?>
</div>




<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>