<?php
/**
 * @author Samuel Loranger <samuelloranger@gmail.com>
 */
?>
<!DOCTYPE html>
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
    <meta name="author" content="Samuel Loranger">
    <meta name="keywords" content="HTML, CSS, JavaScript, Wordpress, Développemenr Web, Développeur, Intégrateur">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="theme-color" content="#000000">

    <?php
    // Favicons
    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(); ?>/assets/icons/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(); ?>/assets/icons/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri(); ?>/assets/icons/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri(); ?>/assets/icons/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= get_template_directory_uri(); ?>/assets/icons/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css"/>
<!--    <link rel="stylesheet" href="--><?//= get_template_directory_uri(); ?><!--/css/styles.min.css"/>-->
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>


<header id="en-tete" class="header">
    <noscript class="noscript">Attention! Ce site fonctionne mieux avec Javascript... Veuillez l'activer.</noscript>

    <!--  HEADER DESKTOP  -->
    <div class="header__desktop">
        <div class="logo">
            <img src="<?= get_template_directory_uri();?>/assets/sl-logo.png" alt="Logo de Samuel Loranger" class="">
        </div>
        <?php if(has_nav_menu('principal')) : ?>
            <nav id="principal" class="header__desktop__nav">
                <a class="header__desktop__nav--home" href="<?= get_site_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/icons/home.svg"/></a>

                <?php wp_nav_menu( array('theme_location' => 'principal'));?>
            </nav>
        <?php endif; ?>
    </div>

    <div class="header__social">
        <?php if(get_theme_mod( 'social_show_facebook', false) == "true"){ ?>
            <a href="<?= get_theme_mod( 'link_facebook'); ?>">
                <img src="<?= get_template_directory_uri(); ?>/assets/social/facebook.png" alt="Lien Facebook">
            </a>
        <?php } ?>

        <?php if(get_theme_mod( 'social_show_twitter', false) == "true"){ ?>
            <a href="<?= get_theme_mod( 'link_twitter'); ?>">
                <img src="<?= get_template_directory_uri(); ?>/assets/social/twitter.png" alt="Lien Twitter">
            </a>
        <?php } ?>

        <?php if(get_theme_mod( 'social_show_instagram', false) == "true"){ ?>
            <a href="<?= get_theme_mod( 'link_instagram'); ?>">
                <img src="<?= get_template_directory_uri(); ?>/assets/social/instagram.png" alt="Lien Instagram">
            </a>
        <?php } ?>

        <?php if(get_theme_mod( 'social_show_github', false) == "true"){ ?>
            <a href="<?= get_theme_mod("link_github"); ?>">
                <img src="<?= get_template_directory_uri(); ?>/assets/social/github.png" alt="Lien GitHub">
            </a>
        <?php } ?>

        <?php if(get_theme_mod( 'social_show_linkedin', false) == "true"){ ?>
            <a href="<?= get_theme_mod( 'link_linkedin'); ?>">
                <img src="<?= get_template_directory_uri(); ?>/assets/social/linkedin.png" alt="Lien LinkedIn">
            </a>
        <?php } ?>
    </div>

    <!--  HEADER MOBILE  -->
    <?php if(has_nav_menu('principal')) : ?>
    <div class="header__mobile">
        <div class="header__mobile__conteneur">
            <img src="<?= get_template_directory_uri();?>/assets/sl-logo.png" alt="Logo de Samuel Loranger" class="logo">

            <button id="btnMenu" class=" hamburger hamburger--spin" type="button" aria-label="Menu">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>


        <nav id="principal" class="header__mobile__nav header__mobile__nav--ferme">

            <?php //Importation du menu principal, peu ne pas être utilisé
            wp_nav_menu( array('theme_location' => 'principal'));?>

            <div class="header__socialMobile">
                <a class="header__mobile__nav--home" href="<?= get_site_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/icons/home.svg"/></a>

                <?php if(get_theme_mod( 'social_show_facebook', false) == "true"){ ?>
                    <a href="<?= get_theme_mod( 'link_facebook'); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/assets/social/facebook.png" alt="Lien Facebook">
                    </a>
                <?php } ?>

                <?php if(get_theme_mod( 'social_show_twitter', false) == "true"){ ?>
                    <a href="<?= get_theme_mod( 'link_twitter'); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/assets/social/twitter.png" alt="Lien Twitter">
                    </a>
                <?php } ?>

                <?php if(get_theme_mod( 'social_show_instagram', false) == "true"){ ?>
                    <a href="<?= get_theme_mod( 'link_instagram'); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/assets/social/instagram.png" alt="Lien Instagram">
                    </a>
                <?php } ?>

                <?php if(get_theme_mod( 'social_show_github', false) == "true"){ ?>
                    <a href="<?= get_theme_mod("link_github"); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/assets/social/github.png" alt="Lien GitHub">
                    </a>
                <?php } ?>

                <?php if(get_theme_mod( 'social_show_linkedin', false) == "true"){ ?>
                    <a href="<?= get_theme_mod( 'link_linkedin'); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/assets/social/linkedin.png" alt="Lien LinkedIn">
                    </a>
                <?php } ?>
            </div>
        </nav>
    </div>
    <?php endif; ?>

</header>

<div class="contenuSite">