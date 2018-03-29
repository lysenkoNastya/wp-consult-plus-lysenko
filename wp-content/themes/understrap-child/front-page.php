<?php
/**
 * Template Name: Home
 *
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<section class="carousel-industry-section" style="background-image:url('<?php echo get_theme_mod( 'bg_front_page' );?>'); ">
    <div id="carouselExampleIndicators" class="carousel slide carousel-block carousel-industry" data-ride="carousel" >
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="carousel-btn active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="carousel-btn"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class="carousel-btn"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active text-left">
                <div class="d-block">
                    <div class="carousel-block-info">
                        <span class="why-us-subtitle industry text-left">
                            <?php echo get_theme_mod( 'industry_slider_subtitle' );?>
                        </span>
                        <h3 class="why-us-title industry d-block text-left">
                             <?php echo get_theme_mod( 'industry_slider_title' );?>
                        </h2><!-- открываешь Н3 а закрываешь Н2? -->
                    </div>
                </div>
                <div class="industry-block d-inline-block">
                <div class="row"><!-- Отступы -->
                    <ul class="industry-project-listr col-6"> <!-- Вообще не правильная логика. задаешь отдельный филд в таксономии и туда каждому терму задаешь картинку и уже потом по термам прогоняешь -->
                        <?php
                           $industry = new WP_Query( array('post_type' => array( 'industry' )) ); //Надо указывать количество постов которые тянешь иначе будет доставать столько сколько установлено в админке
                           if ( $industry->have_posts() ) { //проверку надо делать до тега списка, что бы если постов нет - не выводить пустой тег
                            while ( $industry->have_posts() ) {
                             $industry->the_post(); ?>
								<!-- это должен быть список термов таксономии, и они должны быть ссылками на архив терма -->
                                <li class="industry-project-list-item" data-target="<?= get_the_tags(); ?>"> <!-- get_the_tags() - ничего не выводит -->
                                    <div class="section-industry-list-item-image"><?php the_post_thumbnail(); ?></div><!-- нет проверки на наличие этой самой картинки -->
                                </li>
                        <?php
                            }
                        } else {
                            // Постов не найдено
							   //тут как бы тоже что то надо писать или же не вставлять елсе
                        }
                        wp_reset_query();
                        wp_reset_postdata();
                        ?>
                    </ul>
                    <ul class="industry-menu-list  text-center col-6">
                        <?php $terms = get_terms( 'industry' );
                        if( $terms && ! is_wp_error($terms) ){
                            foreach( $terms as $term ){ ?>
                            <li class="nav-item industry-menu-list-item d-block portfolio-menu-list-link ">
                                <a class="nav-link industry-menu-list-link" href="<?= $term->slug; ?>"  data-target="<?= $term->slug; ?>">
                                    <?= $term->name; ?>
                                </a>
                            </li>
                            <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div></div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> <!-- Карусель не работает и что ты тут листаешь? -->
    </div>
</section>

<section class="about-us">
    <div class="container">
        <div class="row">
            <?php $myfile = get_field('section_about_us');
                if( !empty($myfile) ): ?>
                <div class="why-us col-sm-7 text-right">
                    <span class="why-us-subtitle d-block">
						<!-- Надо каждое поле перепроверять -->
                        <?php echo $myfile['sub_title']; ?>
                    </span>
                    <h3 class="why-us-title d-block">
                        <?php echo $myfile['title']; ?>
                    </h3>
                    <span class="why-us-text d-block">
                         <?php echo $myfile['text']; ?>
                    </span>
                    <a href="#" class="why-us-btn d-inline-block"><!-- Ссылка тоже должна задаваться из админки -->
                         <?php echo $myfile['btn']; ?>
                    </a>
                </div>
                <a class="col-sm-5" href="#">
                    <image class="about-us-img" src="<?php echo $myfile['image']; ?>" alt="about_us_image"><!-- А что это за новый тег такой??? -->
                </a>
                <a href="#">
                    <image class="about-us-img-years" src="<?php echo $myfile['image_years']; ?>" alt="about_us_image_years">
                </a>
            <?php endif; ?>
        </div>

    </div>
</section>

<section class="our-steps">
    <div class="container">
         <?php $myfile = get_field('section-our-steps');
            if( !empty($myfile) ): ?>

            <span class="our-steps-subtitle d-block">
                <?php echo $myfile['sub_title']; ?>
            </span>
            <h3 class="our-steps-title d-block">
                <?php echo $myfile['title']; ?>
            </h3>
            <ul class="our-steps-list row">
                <li class="our-steps-list-item col-md-4"><!-- Это должно в цикле прогоняться и выводиться -->
                    <a class="our-steps-list-item-link d-inline-block" href="#">
                        <image class="our-steps-item-img" src="<?php echo $myfile['icon_img_item1']; ?>" alt="our_steps_image1">
                    </a>
                    <span class="our-steps-item-number d-block">
                         <?php echo $myfile['number_item1']; ?>
                    </span>
                    <h3 class="our-steps-item-title d-block">
                        <?php echo $myfile['title_item1']; ?>
                    </h3>
                    <span class="our-steps-item-text d-block">
                         <?php echo $myfile['text_item1']; ?>
                    </span>
                </li>
                <li class="our-steps-list-item col-md-4">
                    <a class="our-steps-list-item-link d-inline-block" href="#">
                        <image class="our-steps-item-img" src="<?php echo $myfile['icon_img_item2']; ?>" alt="our_steps_image2">
                    </a>
                    <span class="our-steps-item-number d-block">
                         <?php echo $myfile['number_item2']; ?>
                    </span>
                    <h3 class="our-steps-item-title d-block">
                        <?php echo $myfile['title_item2']; ?>
                    </h3>
                    <span class="our-steps-item-text d-block">
                         <?php echo $myfile['text_item1']; ?>
                    </span>

                </li>
                <li class="our-steps-list-item col-md-4">
                    <a class="our-steps-list-item-link d-inline-block business" href="#">
                        <image class="our-steps-item-img" src="<?php echo $myfile['icon_img_item3']; ?>" alt="our_steps_image3">
                    </a>
                    <span class="our-steps-item-number d-block">
                         <?php echo $myfile['number_item3']; ?>
                    </span>
                    <h3 class="our-steps-item-title d-block">
                        <?php echo $myfile['title_item3']; ?>
                    </h3>
                    <span class="our-steps-item-text d-block">
                         <?php echo $myfile['text_item3']; ?>
                    </span>

                </li>
            </ul>
        <?php endif; ?>
    </div>
</section>

<section class="clients-testimonials ">
    <div class="container">
        <div class="<?php echo esc_attr( $container ); ?>">
                <span class="our-steps-subtitle d-block">
                    <?= the_field('testimonials-sub_title') ?><!-- the_field и так выводит -->
                </span>
                <h3 class="why-us-subtitle d-block">
                    <?= the_field('testimonials-title') ?>
                </h3>
                <?php
                $query = new WP_Query(array('post_type' => 'testimonials'));
                if ($query->have_posts()) { ?>
                    <ul class="slider-quote-list text-center">
                        <?php while ($query->have_posts()) {
                            $query->the_post(); ?>
                            <li class="slider-quote-item blog-quote-post">
                                <?php the_content(); ?>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php
                } else {
                }
                wp_reset_postdata();

                if ($query->have_posts()) { ?>
                    <ul class=" slider-image-list">
                        <?php while ($query->have_posts()) {
                            $query->the_post(); ?>

                            <li class="d-flex align-items-center slider-image-item">
                                <div> <?php the_post_thumbnail(); ?> </div>
                                <div class=" d-flex ">
                                    <span> <?php the_title(); ?></span><!-- Ну это же заголовок -->
                                    <span><?php echo get_post_meta(get_the_ID(), 'position', true); ?></span>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php
                } else {
                }
                wp_reset_postdata();
                ?>
            </div>

     </div>
</section>

<section class="contact-us">
    <div class="container">
        <?php $myfile = get_field('section-contact-us');
        if( !empty($myfile) ): ?>
            <span class="our-steps-subtitle d-block">
                <?php echo $myfile['sub_title']; ?>
            </span>
            <h3 class="our-steps-title d-block">
                <?php echo $myfile['title']; ?>
            </h3>
            <ul class="contact-us-list row d-flex justify-content-center">
                <li class="contact-us-item col-md-4">
                    <div class="row border-wrap">
                        <a class="contact-us-item-icon d-inline-block col-sm-4" href="#">
                            <image class="contact-us-item-icon-img" src="<?php echo $myfile['icon_email']; ?>" alt="icon_email">
                        </a>
                        <div class="col-sm-8">
                            <h3 class="our-steps-title title-contact-us d-block">
                                <?php echo $myfile['title_email']; ?>
                            </h3>
                            <?php echo get_theme_mod('email_text'); ?>
                        </div>
                    </div>
                </li>
                <li class="contact-us-item col-md-4">
                    <div class="row border-wrap">
                        <a class="contact-us-item-icon d-inline-block col-sm-4" href="#">
                            <image class="contact-us-item-icon-img" src="<?php echo $myfile['icon_phone']; ?>" alt="icon_phone">
                        </a>
                        <div class="col-sm-8">
                            <h3 class="our-steps-title title-contact-us d-block">
                                <?php echo $myfile['title_phone']; ?>
                            </h3>
                            <?php echo get_theme_mod('phone_number'); ?>
                        </div>
                    </div>
                </li>
                <li class="contact-us-item col-md-4">
                    <div class="row border-wrap">
                        <a class="contact-us-item-icon d-inline-block col-sm-4" href="#">
                            <image class="contact-us-item-icon-img" src="<?php echo $myfile['icon_career']; ?>" alt="icon_career">
                        </a>
                        <div class="col-sm-8">
                            <h3 class="our-steps-title title-contact-us d-block">
                                <?php echo $myfile['title_career']; ?>
                            </h3>
                            <?php echo get_theme_mod('career_text'); ?>
                        </div>
                    </div>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
