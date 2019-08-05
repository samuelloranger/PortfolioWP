<?php

/* Ajout d'un emplacement de menu */
if(function_exists("register_nav_menus")){
    register_nav_menus(
        array(
            "principal"     => "Menu principal"
        )
    );

}

/* Ajout de l'utilisation de la sidebar par défaut */
if(function_exists("register_sidebar")) {
    register_sidebar(
        array(
            "id"                => "footer_gauche",
            "name"              => "Footer gauche",
            "description"       => "",
            "before_widget"     => "",
            "after_widget"     => "",
            "before_title"     => "<h3>",
            "after_title"     => "</h3>",
        )
    );
    register_sidebar(
        array(
            "id"                => "footer_droite",
            "name"              => "Footer droite",
            "description"       => "",
            "before_widget"     => "",
            "after_widget"     => "",
            "before_title"     => "<h3>",
            "after_title"     => "</h3>",
        )
    );
}

/* Création post la page projets */
function projets_custom_post()
{
    $labels = array(
        // Le nom au pluriel
        'name' => _x('Projets', 'Post Type General Name'),
        //Le nom au singulier
        'singular_name' => _x('Projets', 'Post Type Singular Name'),
        //Le libellé affiché dans le menu
        'menu_name' => __('Projets'),
        //Les différents libellés de l'interface administrative
        'all_items' => __('Tous nos projets'),
        'view_item' => __('Voir le projet'),
        'add_new_item' => ('Ajouter un projet'),
        'add_new' => __('Ajouter'),
        'edit_item' => __('Éditer le projet'),
        'update_item' => __('Modifier le projet'),
        'search_items' => __('Recherche un projet'),
        'not_found' => __('Non trouvé'),
        'not_found_in_trash' => __('Non trouvé dans la corbeille'),

    );

    //On peut définir ici d'autres options pour notre type d'article personnalisé
    $args = array(
        'label' =>__('Nos projets'),
        'description' => __('Toutes nos projets'),
        'labels' => $labels,
        'supports' => array('title', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projets'),
    );

    //On enregistre notre type d'article personnalisé qu'on nomme ici "services" et ses arguments
    register_post_type('projets', $args);
}

//Écouteur nouvelles
add_action('init', 'projets_custom_post', 0);

//********************************************************************************

//Fonction qui liste les pages existantes pour en créer un menu déroulant
if( class_exists( 'WP_Customize_Control' ) ):
    class WP_Customize_Latest_Post_Control extends WP_Customize_Control {
        public $type = 'latest_post_dropdown';
        public $post_type = 'post';

        public function render_content() {

            $latest = new WP_Query( array(
                'post_type'   => $this->post_type,
                'post_status' => 'publish',
                'orderby'     => 'date',
                'order'       => 'DESC'
            ));

            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <select <?php $this->link(); ?>>
                    <?php
                    while( $latest->have_posts() ) {
                        $latest->the_post();
                        echo "<option " . selected( $this->value(), get_permalink(get_the_ID(), false)) . " value='" . get_permalink(get_the_ID(), false) . "'>" . the_title( '', '', false ) . "</option>";
                    }
                    ?>
                </select>
            </label>
            <?php
        }
    }
endif;

function theme_customize_register($wp_customize){

    $wp_customize->add_section('liens_reseaux_sociaux', array(
        'title'    => __('Personnalisation du thème', 'samuelloranger'),
        'description' => 'Définie les liens des réseaux sociaux du thème',
        'priority' => 1,
    ));

    /*
     * Lien Twitter
     */
    $wp_customize->add_setting('twitter', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('liens_reseaux_sociaux', array(
        'label'      => __('Lien Twitter', 'samuelloranger'),
        'section'    => 'liens_reseaux_sociaux',
        'settings'   => 'twitter',
    ));
}

add_action('customize_register', 'theme_customize_register');


//Ajoute une clase sur l'item de menu actif
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'menuItem__active';
    }
    return $classes;
}


add_image_size("thumbnail@2x", 320, 180);
add_image_size("medium@2x", 640, 360);
add_image_size("large@2x", 1280, 750);
add_theme_support('post-thumbnails');

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
?>