<?php
/**
 * @author Samuel Loranger <samuelloranger@gmail.com>
 */
get_header(); ?>

<main class="">
    <article class="article">
        <?php the_post();?>

        <div class="article__image">
            <?php
                $image = get_field('image');
                $width = $image['sizes']['medium@2x-width'];
                $height = $image['sizes']['medium@2x-height'];
            ?>

            <img src="<?= $image['url']; ?>" width="<?= $width ?>" alt="Image du projet <?= the_title(); ?>"/>

            <div class="article__image__background-fix">
            </div>
        </div>

        <div class="article__contenu">
            <h1><?php the_title(); ?></h1>

            <div>
                <?php the_field('description_longue'); ?>
            </div>

            <div class="article__contenu__boutons">
                <?php if(get_field("url") != "http://samuelloranger.com/"){ ?>
                    <a class="btnElement btnElementPrimaire--orange btnIcone btnIcone--consulter" href="<?= get_field("url"); ?>" target="_blank"><span>Voir le projet</span></a>
                <? } ?>

                <?php if(get_field("url_github") != "https://github.com/samuelloranger/"){ ?>
                    <a class="btnElement btnElementSecondaire--orange btnIcone btnIcone--github" href="<?= get_field("url_github"); ?>" target="_blank"><span>Voir sur github</a></a>
                <?php } ?>
            </div>
         </div>
    </article>
</main>
<!-- Importation du footer -->
<?php get_footer(); ?>
