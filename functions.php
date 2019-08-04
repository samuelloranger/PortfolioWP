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

/* Création post la page nouvelles */
function produits_custom_post()
{
    $labels = array(
        // Le nom au pluriel
        'name' => _x('Produits', 'Post Type General Name'),
        //Le nom au singulier
        'singular_name' => _x('Produits', 'Post Type Singular Name'),
        //Le libellé affiché dans le menu
        'menu_name' => __('Produits'),
        //Les différents libellés de l'interface administrative
        'all_items' => __('Tous nos produits'),
        'view_item' => __('Voir le produit'),
        'add_new_item' => ('Ajouter un produit'),
        'add_new' => __('Ajouter'),
        'edit_item' => __('Éditer le produit'),
        'update_item' => __('Modifier le produit'),
        'search_items' => __('Recherche un produit'),
        'not_found' => __('Non trouvé'),
        'not_found_in_trash' => __('Non trouvé dans la corbeille'),

    );

    //On peut définir ici d'autres options pour notre type d'article personnalisé
    $args = array(
        'label' =>__('Nos produits'),
        'description' => __('Toutes nos produits'),
        'labels' => $labels,
        'supports' => array('title', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'produits'),
    );

    //On enregistre notre type d'article personnalisé qu'on nomme ici "services" et ses arguments
    register_post_type('produits', $args);
}

//Écouteur nouvelles
add_action('init', 'produits_custom_post', 0);


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

//Permet l'affichage d'images des nouvelles
if(function_exists("add_theme_support")){
    add_theme_support("post-thumbnails");
}

//Permet de changer l'image d'arrière-plan
function enregistrer_personnalisation_theme($wp_customize){
    //Section
    $wp_customize -> add_section("ma_section",
        array(
            "title" => "Option du thême Batteries des Récollets",
            "description" => "Personnalisation du thême Batteries des Récollets",
            "priority" => 1)
    );
}


//add_action("customize_register", "enregistrer_personnalisation_theme");


//Ajoute une clase sur l'item de menu actif
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'menuItem__active';
    }
    return $classes;
}


add_image_size("thumbnail@2x", 556, 556);
add_image_size("medium@2x", 604, 604);
add_image_size("large@2x", 750, 750);

add_theme_support('post-thumbnails');
?>