<?php
/**
* @author Samuel Loranger <samuelloranger@gmail.com>
*/
?>

    <footer class="footer">
        <div class="footer__contenu conteneur">

            <?php
            //Ajoute la sidebar droite si besoin
            if(is_active_sidebar("footer_gauche")) { ?>
                <aside id="footer_gauche" class="footer__contenu__widget footer__widgetGauche">
                    <?php get_sidebar("footer_gauche") ?>
                </aside>
            <?php } ?>

            <?php
            //Ajoute la sidebar droite si besoin
            if(is_active_sidebar("footer_droite")) { ?>
                <aside id="footer_droite" class="footer__contenu__widget footer__widgetDroit">
                    <?php get_sidebar("footer_droite") ?>
                </aside>
            <?php } ?>

        </div>

        <div class="footer__credits">
            <p><small>Samuel Loranger&nbsp;|&nbsp;2019 Tous droits réservés</small></p>
        </div>
    </footer>


    <?php wp_footer(); ?>

    <script type="text/javascript" src="<?= get_template_directory_uri(); ?>/scripts/menu.js"></script>
    </div> <!-- fermeture de la boîte #contenu -->
    </body>
</html>
