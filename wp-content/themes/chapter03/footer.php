<?php

/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>

</main>

<footer id="footer" class="footer-wrapper c-footer">
    <div class="c-footer__logo">
        <div class="l-container">
            <a href="<?php echo home_url(); ?>"><?php if (function_exists('the_custom_logo')) {
                                                    the_custom_logo();
                                                } ?></a>
        </div>
    </div>
    <div class="c-footer__main">
        <div class="l-container">
            <div class="c-footer__link">
                <?php wp_nav_menu(array('theme_location' => 'menu-footer-1')); ?>
            </div>

            <div class="c-footer__link">
                <?php wp_nav_menu(array('theme_location' => 'menu-footer-2')); ?>
            </div>

            <div class="c-footer__link">
                <?php wp_nav_menu(array('theme_location' => 'menu-footer-3')); ?>
            </div>
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/assets/js/themes.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/ajaxfilter-services.js"></script>
</body>

</html>