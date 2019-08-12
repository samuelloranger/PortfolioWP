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
        </div>
    </article>
</main>
<!-- Importation du footer -->
<?php get_footer(); ?>
