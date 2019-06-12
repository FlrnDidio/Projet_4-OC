<?php $title = 'Le blog de Jean Forteroche'; ?>

<?php ob_start(); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 welcome">
            <h1> Bienvenue à tous</h1>
            <p>
                Pour mon dernier livre, j'ai décidé d'innover et de le publier sous forme de billets, retrouvez ci-dessous mes derniers billets.
            </p>

        </div>
    </div>

    <h2>Derniers billets du blog :</h2>


    <?php
    while ($data = $posts->fetch())
    {
    ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                <em>le <?= $data['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                <button class="btn btn-outline-primary"><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir les commentaires</a></em></button>
            </p>
        </div>
    <?php
    }
    $posts->closeCursor();
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
