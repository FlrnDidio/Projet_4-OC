<?php 
    $title = htmlspecialchars($post['title']); ?>

<?php ob_start() ; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p><a href="index.php?action=showAdmin">Retour à la liste des billets</a></p>
            <div class="news">
                <h2>
                    <?= htmlspecialchars($post['title']) ?>
                    <em>le <?= $post['creation_date_fr'] ?></em>
                </h2>
                
                <p>
                    <?= strip_tags(nl2br(html_entity_decode($post['content']))) ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container mod_comments">
	<h3>Commentaires modérés</h3><br/>

    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <div class="row">
            <form action="index.php?action=moderate&amp;id=<?= $comment['id'] ?>" method="post" id="moderate_form_1">
                <label for="publishComment">Valider le commentaire<input type="radio" name="publishComment" value="oui" id="publishComment"/></label>
                <label for="publishComment">Supprimer le commentaire<input type="radio" name="publishComment" value="non" id="publishComment"/></label>
                <button type="submit" class="btn btn_primary">Modérer</button>
            </form>
        </div>

    <?php
    }
    $comments->closeCursor();
    ?>
</div>

<div class="container mod_comments">
    <h3>Commentaires non-modérés</h3><br/>
	
    <?php
    while ($modComment = $modComments->fetch())
    {
    ?>  
        <p><strong><?= htmlspecialchars($modComment['author']) ?></strong> le <?= $modComment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($modComment['comment'])) ?></p>
        <div class="row">
            <form method="post" action="index.php?action=moderate&amp;id=<?= $modComment['id'] ?>">
                <label for="publishComment">Valider le commentaire<input type="radio" name="publishComment" value="oui" id="publishComment"/></label>
                <label for="publishComment">Supprimer le commentaire<input type="radio" name="publishComment" value="non" id="publishComment"/></label>
                <button type="submit" class="btn btn_primary">Modérer</button>
            </form>
        </div>

    <?php
    }
    $modComments->closeCursor();
    ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>