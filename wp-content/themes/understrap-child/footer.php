<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>
<footer class="site-footer" id="colophon">
	<div class="<?php echo esc_attr( $container ); ?>">
        <div class="wrapper" id="wrapper-footer">
            <section class="footer-top row">
                <div class="news-letter text-left col-sm-5">
                    <?php dynamic_sidebar( 'footer-top-left' ); ?>
                </div>
                <div class="col-sm-7">
                    <ul class="news-letter d-flex align-items-start row">
                        <li class="d-inline-block footer-top-menu col-lg-3">
                            <?php dynamic_sidebar( 'footer-top-navigation' ); ?>
                        </li>
                        <li class="d-inline-block footer-top-menu col-lg-3">
                            <?php dynamic_sidebar( 'footer-top-industry' ); ?>
                        </li>
                        <li class="d-inline-block footer-top-menu col-lg-3">
                            <?php dynamic_sidebar( 'footer-top-follow-us' ); ?>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="footer-bottom">
                <span class="footer-bottom-text">
                    <?php dynamic_sidebar( 'footer-bottom' ); ?>
                </span>
            </section>
        </div><!-- wrapper end -->
	</div><!-- container end -->
</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>

</html>

