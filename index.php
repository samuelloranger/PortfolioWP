<!-- Importation du header -->
<!-- Author: Samuel Loranger -->
<?php $lienRacine = "" . get_site_url() . "/wp-content/themes/pixweb/"; ?>

<?php get_header(); ?>

<div id="contenu">
    <div id="nouvelles" class="accueil__articles conteneur">
        <h2 class="accueil__articles__titre">Ce que l’on raconte</h2>
        <?php
        $posts = get_posts(array(
                'posts per page' => -1,
                'post_type' => 'nouvelles',
                'post_status' => 'the_title',
                'orderby' => 'the_title',
                'order' => 'ASC',
        ));

        if ($posts):
            foreach($posts as $post):?>

                <div class="accueil__articles__article">
                    <?php   $image = get_field('image_nouvelle');
                            $taille = 'thumbnail';
                            $tailleImage = $image['sizes'][ $taille . '-width' ]; ?>

                    <div class="accueil__articles__article__image">
                        <img src="<?php echo $image['url']; ?>" width="<?php echo $tailleImage; ?>" height="<?php echo $tailleImage; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>

                    <div class="accueil__articles__article__contenu">
                        <h3><a href="<?php echo $post -> guid;?>"><?= $post -> post_title;?></a></h3>
                        <p class=""><?= get_field("texte_nouvelle");?></p>

                        <a class="accueil__articles__article__contenu__lien btnLien" href="<?php echo $post -> guid;?>">Lire la nouvelle</a>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

<!-- Importation du footer -->
<?php get_footer(); ?>