<?php $title = 'Admin All Comments'; 
ob_start(); ?>

<div class="container">
	<a href="index.php?action=showAdmin">Retourner à l'espace admin</a>
    <h3>Commentaires signalés</h3><br/>

    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <div class="row">
            <form action="index.php?action=moderate&amp;id=<?= $comment['id'] ?>" method="post" class="moderate_buttons" id="moderate_form">
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






<?php $content = ob_get_clean();
require('template.php'); ?>


