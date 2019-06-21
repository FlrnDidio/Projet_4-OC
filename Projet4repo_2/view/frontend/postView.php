<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p><a href="index.php">Retour à la liste des billets</a></p>
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

    <h3>Commentaires</h3><br/>

    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
    }
    $comments->closeCursor();
    ?>

    

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>"  class="form-horizontal col-lg-5 form_post_comments" method="post">
        <legend>Ajouter un commentaire</legend>
        <div class="form-group">
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div class="form-group">
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
