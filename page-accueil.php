<?php /*Template name: Accueil*/
/**
 * @author Samuel Loranger <samuelloranger@gmail.com>
 */
get_header(); ?>

<!-- Author: Samuel Loranger -->
<main class="accueil">
    <div id="a-propos" class="accueil__description">
        <div class="accueil__description__infos">
            <h1><?= get_bloginfo("name"); ?></h1>
            <h2><?= get_bloginfo("description");?></h2>
            <?php echo apply_filters('the_content', get_post_field('post_content', $id)); ?>
        </div>

        <div class="accueil__description__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/samlo.png" alt="Photo de <?= get_bloginfo("name"); ?>">
        </div>
    </div>

    <div class="accueil__talents">
        <div class="accueil__talents__talent">
            <img src="<?= get_template_directory_uri(); ?>/assets/icons/responsive.png" alt="">
            <h2>Design</h2>
            <p>Le design responsive est nécéssaire de nos jours !</p>
            <p>J'utilise les produits Adobe pour créer mes maquettes (Photoshop, XD, Illustrator)</p>
        </div>
        <div class="accueil__talents__talent">
            <img src="<?= get_template_directory_uri(); ?>/assets/icons/html5.png" alt="">
            <h2>Front-End</h2>
            <p>J'adore le front-end, je suis spécialisé en HTML5, CSS3, SASS, JavaScript, jQuery, mais je connais également le PHP !</p>
        </div>
        <div class="accueil__talents__talent">
            <img src="<?= get_template_directory_uri(); ?>/assets/icons/wordpress.png" alt="">
            <h2>Wordpress</h2>
            <p>Wordpress n'a aucun secret pour moi :</p>
            <p>Plugins, thèmes, migration, formulaires personnalisés...</p>
        </div>
    </div>

    <h2 id="projets_personnels">Projets personnels</h2>
    <?php
    $posts = get_posts(array(
        'nopaging' => true,
        'post_type' => 'projets',
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    if ($posts):
        foreach($posts as $post):
            if(get_field("type") == "projet_personnel"){ ?>
                <div class="accueil__projets">
                    <?php $image = get_field('image'); ?>

                    <div class="accueil__projets__image">
                        <a href="<?= get_permalink(); ?>">
                            <img src="<?php echo $image['url']; ?>" alt="Image du projet : <?= get_field("nom_service");?>" />
                        </a>
                    </div>

                    <div class="accueil__projets__description">
                        <div>
                            <h3 class="accueil__projets__titre"><?= the_title(); ?></h3>
                            <p><?= get_field("description_courte");?></p>
                        </div>
                        <a  class="btnElement btnElement--orange btnConsulter" href="<?= get_permalink(); ?>" aria-label="Consulter plus d'informations concernant le projet <?= the_title(); ?>"><span>Consulter</span></a>
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
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    if ($posts):
        foreach($posts as $post):
            if(get_field("type") == "projet_scolaire"){ ?>
                <div class="accueil__projets">
                    <?php $image = get_field('image'); ?>

                    <div class="accueil__projets__image">
                        <img src="<?= $image['url']; ?>" alt="Image du projet : <?= get_field("titre");?>" />
                    </div>

                    <div class="accueil__projets__description">
                        <div>
                            <h3 class="accueil__projets__titre"><?= the_title(); ?></h3>
                            <?= get_field("description_courte");?>
                        </div>
                        <a class="btnElement btnElement--orange btnConsulter" href="<?= get_permalink(); ?>" aria-label="Consulter plus d'informations concernant le projet <?= the_title(); ?>" ><span>Consulter</span></a>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    <?php endif; ?>
</main>

<!-- Importation du footer -->
<?php get_footer(); ?>
