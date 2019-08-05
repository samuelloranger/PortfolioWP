
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title>
        <?php bloginfo("name"); ?>
        <?php if(is_home() OR is_front_page()) : ?>
            &mdash; <?php bloginfo("description");?>
        <?php else : ?>
            &mdash; <?php wp_title("", true); ?>
        <?php endif; ?>
    </title>

    <?php $lienRacine = "" . get_site_url() . "/wp-content/themes/samuelloranger/"; ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="theme-color" content="#000000">
    <link rel="stylesheet" href="<?php echo $lienRacine; ?>css/styles.css"/>
    <!--    <link rel="stylesheet" href="--><?php //echo $lienRacine; ?><!--css/styles.min.css"/>-->
    <?php wp_head(); ?>

</head>
<body <?php  body_class(); ?>>


<header id="en-tete" class="header">
    <noscript class="noscript">Attention! Ce site fonctionne mieux avec Javascript... Veuillez l'activer.</noscript>

    <div class="header__desktop">
        <div class="logo">
            <img src="<?= $lienRacine?>assets/sl-logo.png" class="">
        </div>
        <?php if(has_nav_menu('principal')) : ?>
            <nav id="principal" class="header__desktop__nav">
                <?php wp_nav_menu( array('theme_location' => 'principal'));?>
            </nav>
        <?php endif; ?>
    </div>

    <?php if(has_nav_menu('principal')) : ?>
    <div class="header__mobile">
        <div class="header__mobile__conteneur">
            <img src="<?= $lienRacine?>assets/sl-logo.png" class="logo">

            <button id="btnMenu" class=" hamburger hamburger--spin" type="button" aria-label="Menu" aria-controls="navigation">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>

        <nav id="principal" class="header__mobile__nav header__mobile__nav--ferme">
            <?php wp_nav_menu( array('theme_location' => 'principal'));?>

            <div class="header__socialMobile">
                <a href=""><img src="<?= $lienRacine; ?>assets/social/facebook.png"></a>
                <a href=""><img src="<?= $lienRacine; ?>assets/social/twitter.png"></a>
                <a href=""><img src="<?= $lienRacine; ?>assets/social/instagram.png"></a>
                <a href=""><img src="<?= $lienRacine; ?>assets/social/linkedin.png"></a>
            </div>
        </nav>
    </div>
    <?php endif; ?>

    <div class="header__social">
        <a href=""><img src="<?= $lienRacine; ?>assets/social/facebook.png"></a>
        <a href=""><img src="<?= $lienRacine; ?>assets/social/twitter.png"></a>
        <a href=""><img src="<?= $lienRacine; ?>assets/social/instagram.png"></a>
        <a href=""><img src="<?= $lienRacine; ?>assets/social/linkedin.png"></a>
    </div>
</header>

<div class="contenuSite">