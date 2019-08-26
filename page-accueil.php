<?php /*Template name: Accueil*/
/**
 * @author Samuel Loranger <samuelloranger@gmail.com>
 */
get_header(); ?>

<!-- Author: Samuel Loranger -->
<main class="accueil">
    <div id="a-propos" class="accueil__description">
        <div class="accueil__description__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/samlo.png" alt="Photo de <?= get_bloginfo("name"); ?>">
        </div>

        <div class="accueil__description__infos">
            <h1><?= get_bloginfo("name"); ?></h1>
            <h2><?= get_bloginfo("description");?></h2>
            <?php echo apply_filters('the_content', get_post_field('post_content', $id)); ?>
        </div>
    </div>

    <div class="accueil__talents">
        <div class="accueil__talents__talent">
            <div class="accueil__talents__talent--titre">
                <img src="<?= get_template_directory_uri(); ?>/assets/icons/responsive.png" alt="">
                <h2>Design</h2>
            </div>

            <div class="accueil__talents__talent--description">
                <p>Le design responsive est nécéssaire de nos jours&nbsp;!</p>
                <p>J'utilise les produits Adobe pour créer mes maquettes (Photoshop, XD, Illustrator)</p>
            </div>
        </div>
        <div class="accueil__talents__talent">
            <div class="accueil__talents__talent--titre">
                <img src="<?= get_template_directory_uri(); ?>/assets/icons/html5.png" alt="">
                <h2>Front-End</h2>
            </div>

            <div class="accueil__talents__talent--description">
                <p>J'adore le front-end, je suis spécialisé en HTML5, CSS3, SASS, JavaScript, jQuery, mais je connais également le PHP&nbsp;!</p>
            </div>
        </div>
        <div class="accueil__talents__talent">
            <div class="accueil__talents__talent--titre">
                <img src="<?= get_template_directory_uri(); ?>/assets/icons/wordpress.png" alt="">
                <h2>Wordpress</h2>
            </div>

            <div class="accueil__talents__talent--description">
                <p>Wordpress n'a aucun secret pour moi&nbsp;:</p>
                <p>Plugins, thèmes, migration, formulaires personnalisés...</p>
            </div>
        </div>
    </div>

    <h2 id="projets_personnels">Projets</h2>
    <div class="accueil__projets">
        <?php
        $posts = get_posts(array(
            'nopaging' => true,
            'post_type' => 'projets',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
        ));

        if ($posts):
            foreach($posts as $post): ?>
                <?php
                    //On va chercher l'image, ainsi que sa taille
                    $image = get_field('image');
                    $size = "medium";
                    $image_url = $image['sizes'][$size];
                ?>

                <a class="accueil__projets__projet" href="<?= get_permalink(); ?>" aria-label="Consulter plus d'informations concernant le projet <?= the_title(); ?>">
                    <img class="accueil__projets__projet--image" src="<?= $image_url; ?>" alt="Image du projet : <?= get_field("nom_service");?>"/>

                    <div class="accueil__projets__projet--description">
                        <h2><?= the_title(); ?></h2>
                        <?php
                            $field = get_field_object('type');
                            $value = $field['value'];
                            $label = $field['choices'][$value];
                        ?>
                        <p><?= $label; ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<!-- Importation du footer -->
<?php get_footer(); ?>
