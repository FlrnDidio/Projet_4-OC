
<?php $title = 'Le blog de Jean Forteroche'; ?>

<?php ob_start(); ?>

<div class="container">
    <div class="row flex_content col-md-12">
        <div class="col-lg-10 news" id="welcome">
            <h1> Bienvenue  
                <?php
                if(isset($_SESSION['pseudo'])) {
                    echo $_SESSION['pseudo'];
                }
                else {
                    ?>
                    à tous
                    <?php
                }
                ?>
             </h1>
            <p>
                Pour mon dernier livre, j'ai décidé d'innover et de le publier sous forme de billets, retrouvez ci-dessous mes derniers billets.<br/>
            </p>

        </div>
    </div>

    <h2>Derniers chapitres :</h2>


    <?php
    while ($data = $posts->fetch())
    {
    ?>
        <div class="container flex_content col-md-12 tablet_center">
            <div class="container news post_display col-lg-10 col-md-12" id="content_block">
                <!--<div class="blank">
                </div>-->
                <h4 class="post_date"><em>le <?= $data['creation_date_fr'] ?></em></h4>
                <h3 class="post_title"><?= html_entity_decode($data['title']) ?></h3>
                <div class="col-lg-12 col-md-12 news" id="center_block">
                    <p>
                        <?= nl2br(html_entity_decode($data['content'])) ?>
                        <br />
                    </p>
                </div>
                <a class="btn btn-secondary btn-lg active" id="show_comments_public" role="button" aria-pressed="true" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Afficher le chapitre</a>
            </div>
            <div id="blank"></div>
        </div>
        
        
    <?php
    }
    $posts->closeCursor();
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
