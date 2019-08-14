<?php
/**
 * @author Samuel Loranger <samuelloranger@gmail.com>
 */
/* Ajout d'un emplacement de menu */
if(function_exists("register_nav_menus")){
    register_nav_menus(
        array(
            "principal"     => "Menu principal"
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

    $wp_customize->add_section('social_links', array(
        'title'    => __('Liens réseaux sociaux', 'samuelloranger'),
        'description' => 'Définie les liens des réseaux sociaux du thème',
        'priority' => 1,
    ));

    /*
     * Lien Facebook
     */
    $wp_customize->add_setting( 'facebook', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'facebook', array(
        'label' => __( 'Nom Facebook' ),
        'description' => "<b>Exemple</b>: bill-gates",
        'section' => 'social_links',
    ));

    $wp_customize->add_setting('link_facebook', array(
        'capability'     => 'edit_theme_options',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'link_facebook', array(
        'label'      => ( 'URL Facebook' ),
        'description' => "<b>Exemple</b>: https://www.facebook.com/BillGates",
        'section'    => 'social_links',
    )));


    //Checkbox facebook
    $wp_customize->add_setting('social_show_facebook', array(
        'default' => 0,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'social_show_facebook', array(
        'label' => __( 'Montrer le lien Facebook', 'social_show_facebook' ),
        'section'  => 'social_links',
        'type'=> 'checkbox',
        'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
    ));

    /*
    * Lien Twitter
    */
    $wp_customize->add_setting( 'twitter', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'twitter', array(
        'label' => __( 'Nom Twitter' ),
        'description' => "<b>Exemple</b>: @billgates",
        'section' => 'social_links',
    ));

    $wp_customize->add_setting('link_twitter', array(
        'capability'     => 'edit_theme_options',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'link_twitter', array(
        'label'      => __('URL Twitter', 'link_twitter'),
        'description' => "<b>Exemple</b>: https://twitter.com/billgates",
        'section'    => 'social_links'
    )));

    //Checkbox Twitter
    $wp_customize->add_setting('social_show_twitter', array(
        'default' => 0,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'social_show_twitter', array(
        'label' => __( 'Montrer le lien Twitter', 'social_show_twitter' ),
        'section'  => 'social_links',
        'type'=> 'checkbox',
        'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
    ));

    /*
    * Lien Instagram
    */
    $wp_customize->add_setting( 'instagram', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'instagram', array(
        'label' => __( 'Nom Instagram' ),
        'description' => "<b>Exemple</b>: thisisbillgates",
        'section' => 'social_links',
    ));

    $wp_customize->add_setting('link_instagram', array(
        'capability'     => 'edit_theme_options',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'link_instagram', array(
        'label'      => __('Lien Instagram', 'link_instagram'),
        'description' => "<b>Exemple</b>: https://www.instagram.com/thisisbillgates",
        'section'    => 'social_links'
    )));


    //Checkbox Instagram
    $wp_customize->add_setting('social_show_instagram', array(
        'default' => 0,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'social_show_instagram', array(
        'label' => __( 'Montrer le lien Instagram', 'social_show_instagram' ),
        'section'  => 'social_links',
        'type'=> 'checkbox',
        'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
    ));

    /*
    * Lien Github
    */
    $wp_customize->add_setting( 'github', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'github', array(
        'label' => __( 'Nom Github' ),
        'description' => "<b>Exemple</b>: bill-gates",
        'section' => 'social_links',
    ));

    $wp_customize->add_setting('link_github', array(
        'capability'     => 'edit_theme_options',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'link_github', array(
        'label'      => __('URL Github', 'link_github'),
        'description' => "<b>Exemple</b>: https://github.com/bill-gates",
        'section'    => 'social_links'
    )));

    //Checkbox Hithub
    $wp_customize->add_setting('social_show_github', array(
        'default' => 0,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'social_show_github', array(
        'label' => __( 'Montrer le GitHub', 'social_show_github' ),
        'section'  => 'social_links',
        'type'=> 'checkbox',
        'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
    ));


    /*
    * Lien LinkedIn
    */
    $wp_customize->add_setting('linkedin', array(
        'capability'     => 'edit_theme_options',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'linkedin', array(
        'label'      => __('Nom LinkedIn', 'linkedin'),
        'description' => "<b>Exemple</b>: Bill Gates",
        'section'    => 'social_links'
    )));

    $wp_customize->add_setting('link_linkedin', array(
        'capability'     => 'edit_theme_options',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'link_linkedin', array(
        'label'      => __('Lien LinkedIn', 'link_linkedin'),
        'description' => "<b>Exemple</b>: https://www.linkedin.com/in/williamhgates/",
        'section'    => 'social_links'
    )));

    //Checkbox LinkedIn
    $wp_customize->add_setting('social_show_linkedin', array(
        'default' => 0,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'social_show_linkedin', array(
        'label' => __( 'Montrer le lien LinkedIn', 'social_show_linkedin' ),
        'section'  => 'social_links',
        'type'=> 'checkbox',
        'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
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

?>