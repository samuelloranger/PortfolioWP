<?php /*Template name: Accueil*/

$lienRacine = "" . get_site_url() . "/wp-content/themes/batteries/";

get_header(); ?>

<!-- Author: Samuel Loranger -->

<h1 class="accueil__titre">Votre centre de l’énergie en Mauricie!</h1>

<div id="contenu" class="">
    <div class="conteneur">
        <h2 id="services" class="titreSection">Nos services</h2>
        <div class="accueil__services">
            <?php
            $posts = get_posts(array(
	            'nopaging' => true,
                'post_type' => 'services',
                'post_status' => 'the_title',
                'orderby' => 'the_title',
                'order' => 'ASC',
            ));

            if ($posts):
                foreach($posts as $post): ?>
                    <div class="accueil__services__service">
                        <?php $image = get_field('image_service'); ?>

                        <div class="accueil__services__service__image">
                            <img src="<?php echo $image['url']; ?>" alt="Logo du service: <?= get_field("nom_service");?>" />
                        </div>

                        <h3 class="accueil__services__service__titre"><?= get_field("nom_service");?></h3>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="accueil__services__service">
                <div class="accueil__services__service__image accueil__services__service__imageTelephone">
                    <img src="<?php echo $lienRacine ?>images/svg/phone.svg" alt="Logo du téléphone"/>
                </div>

                <h3 class="accueil__services__service__titre">Contactez-nous</h3>
                <h3 class="accueil__services__service__titre">(819) 840-3377</h3>
                <h3 class="accueil__services__service__titre">Nous offrons meilleur service personnalisé !</h3>
            </div>
        </div>
    </div>

    <div class="accueil__zoneCentrale">
        <h2 class="titreSection">Nouveaux produits</h2>
        <div class="accueil__produits conteneur">
            <?php
            $posts = get_posts(array(
	            'numberposts' => 4,
                'post_type' => 'produits',
                'post_status' => 'publish',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            ));

            if ($posts):
                foreach($posts as $post):
                    if(get_the_title() != "Brouillon auto") { ?>

                    <a href="<?php echo $post -> guid;?>" class="accueil__produits__produit">
                        <?php $image = get_field('image_produit'); ?>

                        <div class="accueil__produits__produit__image">
                            <img src="<?php echo $image['url']; ?>" alt="Image du produit: <?= get_field("nom_produit");?>" />
                        </div>

                        <h3 class="accueil__produits__produit__titre"><?= get_field("nom_produit"); ?></h3>
                    </a>

                <?php } endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="accueil__produits__bouton conteneur">
            <a class="pageBouton bouton" href="<?= get_post_permalink(52);?>"><span>Tous nos produits</span></a>
        </div>
    </div>



    <h2 class="titreSection">Nos installations</h2>
    <div class="accueil__installations conteneur">
        <?php
        $posts = get_posts(array(
            'posts per page' => -1,
            'post_type' => 'installations',
            'post_status' => 'the_title',
            'orderby' => 'the_title',
            'order' => 'ASC',
        ));

        if ($posts):
            foreach($posts as $post):

                if(get_the_title() != "Auto Draft") { ?>

                    <div class="accueil__installations__installation">
                        <?php $image = get_field('image_installation'); ?>

                        <div class="accueil__installations__installation__image">
                            <img src="<?php echo $image['url']; ?>" alt="Image du produit: <?= get_field("nom_installation");?>"/>
                        </div>

                        <div class="accueil__installations__installation__informations">
                            <h3 class="accueil__installations__installation__titre"><?= get_field("nom_installation");?></h3>
                            <p class="accueil__installations__installation__description"><?= get_field("description_installation");?></p>
                        </div>
                    </div>
                <?php } endforeach; ?>
        <?php endif; ?>
    </div>

<!-- Importation du footer -->
<?php get_footer(); ?>
