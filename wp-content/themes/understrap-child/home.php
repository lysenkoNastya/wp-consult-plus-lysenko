<?php
get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

 <section class="blog-section" style="background-image:url('<?php echo get_theme_mod( 'back_image' );?>'); ">
    <div class="container-fluid" >
        <header class="blog-section-header">
            <div class="container">
                <h2 class="general-title blog-section-header-title "> <?php wp_title("", true); ?></h2>
            </div>
        </header>
    </div>
</section>


<div class="wrapper" id="wrapper-index">
<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
<div class="blog-section-main row">
    <div class="blog-section-main-content  col-lg-9 col-sm-6">
        <span class="our-steps-subtitle d-block">
            <?php echo get_theme_mod( 'blog_subtitle' );?>
        </span>
        <h3 class="our-steps-title d-block">
            <?php wp_title("", true); ?>
        </h3>
       <ul class="blog-section-list align-content-center">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php
                    if ( has_post_format( 'audio' )) {  ?>
                     <li class="blog-audio-post blog-section-list-item">
                     <span>
                        <?php the_content(); ?></span>
                        <span>
                        <?php the_excerpt(); ?></span>
                        <date class="date d-inline-block text-right">
                            <?php echo get_the_date('d-M-Y'); ?>
                        </date>
                     </li>
                 <?php } else
                    if ( has_post_format( 'quote' )) {  ?>
                     <li class="blog-quote-post blog-section-list-item">

                        <?php the_excerpt(); ?>
                         <date class="date d-inline-block">
                             <?php echo get_the_date('d-M-Y'); ?>
                         </date>
                      </li>
                  <?php } else {?>
                    <li class="blog-section-list-item">
                        <div class="blog-section-wrapper list-item-text-block text-justify">
                            <a href="<?php the_permalink(); ?>">
                               <?php the_post_thumbnail();?>
                            </a>
                            <h2 class="blog-text-block d-block">
                                <a class="blog-section-list-item-title d-inline-block text-left" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="date-wrapper">
                                <date class="date">
                                    <?php echo get_the_date('d-M-Y'); ?>
                                </date>
                            </div>
                             <?php the_excerpt(); ?>
                        </div>
                    </li>
                    <?php } ?>
            <?php endwhile; ?>
        </ul>
        <?php the_posts_pagination(); ?>
    </div>

    <aside class="blog-section-aside col-lg-3 col-sm-5 col-12 d-inline-block">
        <?php if ( is_active_sidebar( 'sidebar-sone-single-search' ) ) : ?>
            <div>
                <?php dynamic_sidebar( 'sidebar-sone-single-search' ); ?>
            </div>
        <?php endif; ?>
    </aside>


<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
</div>


</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

