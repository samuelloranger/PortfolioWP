<?php $lienRacine = "" . get_site_url() . "/wp-content/themes/samuelloranger/"; ?>


    <footer class="footer" role="contentinfo">
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
            <p><small><a href="https://www.linkedin.com/in/samuel-loranger-b23205174/">Samuel Loranger</a>&nbsp;|&nbsp;2019 Tous droits réservés</small></p>
        </div>
    </footer>


    <?php wp_footer(); ?>

    <script type="text/javascript" src="<?php echo $lienRacine; ?>scripts/menu.js"></script>
    </div> <!-- fermeture de la boîte #contenu -->
    </body>
</html>
