<?php /*Template name: Accueil*/

$lienRacine = "" . get_site_url() . "/wp-content/themes/samuelloranger/";

get_header(); ?>

<!-- Author: Samuel Loranger -->
<main class="accueil">
    <h1 style="display: none;">Samuel Loranger</h1>
    <h2 id="projets_personnels">Projets personnels</h2>
    <?php
    $posts = get_posts(array(
        'nopaging' => true,
        'post_type' => 'projets',
        'post_status' => 'the_title',
        'orderby' => 'the_title',
        'order' => 'ASC',
    ));

    if ($posts):
        foreach($posts as $post):
            if(get_post_status($post) == "publish" && get_field("type") == "projet_personnel"){ ?>
                <div class="accueil__projets">
                    <?php $image = get_field('image'); ?>

                    <div class="accueil__projets__image">
                        <img src="<?php echo $image['url']; ?>" alt="Image du projet : <?= get_field("nom_service");?>" />
                    </div>

                    <div class="accueil__projets__description">
                        <h3 class="accueil__projets__titre"><?= get_field("titre");?></h3>
                        <?= get_field("description");?>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <h2 id="projets_scolaires">Projets scolaires</h2>
    <?php
    $posts = get_posts(array(
        'nopaging' => true,
        'post_type' => 'projets',
        'post_status' => 'the_title',
        'orderby' => 'the_title',
        'order' => 'ASC',
    ));

    if ($posts):
        foreach($posts as $post):
            if(get_post_status($post) == "publish" && get_field("type") == "projet_scolaire"){ ?>
                <div class="accueil__projets">
                    <?php $image = get_field('image'); ?>

                    <div class="accueil__projets__image">
                        <img src="<?php echo $image['url']; ?>" alt="Image du projet : <?= get_field("nom_service");?>" />
                    </div>

                    <div class="accueil__projets__description">
                        <h3 class="accueil__projets__titre"><?= get_field("titre");?></h3>
                        <?= get_field("description");?>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    <?php endif; ?>
</main>

<!-- Importation du footer -->
<?php get_footer(); ?>
