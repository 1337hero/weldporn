<?php
/*
 * Template name: Homepage
 */
get_header(); ?>
 
<section class="main">
    <div class="slideshow">
        <figure class="slider">

        <!-- RUN SLIDESHOW LOOP -->
        <?php $loop = new WP_Query( array( 'post_type' => 'slideshow', 'posts_per_page' => -1, 'orderby'=>'menu_order', 'order'   => 'DESC', ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <figure>
                <img src="<?php echo $image[0]; ?>" class="object-fit_cover"> 
            </figure>
        <?php endwhile; wp_reset_query(); ?>
            <!-- END SLIDESHOW LOOP -->
      </figure>

            <div class="gradient-banner"></div>
        </div>

        <div class="home-content">
            <article class="three-column">
                <a href="/products/armor/" class="column armor">
                    <div class="overlay"></div>
                    <h2 class="centerme">VEHICLE ARMOR</h2>
                    <span class="nice-link">SHOP NOW</span>                
                </a>
                <a href="/products/contour-racks/" class="column rack">
                    <div class="overlay"></div>
                    <h2 class="centerme">CONTOUR RACKS</h2>
                    <span class="nice-link">SHOP NOW</span>
                </a>
                <a href="/products/accessories/" class="column bumpers">
                    <div class="overlay"></div>
                    <h2 class="centerme">ACCESSORIES</h2>
                    <span class="nice-link">SHOP NOW</span>
                </a>
            </article>
            <article class="intro">
                  <?php
                    $post_id = 60;
                    $queried_post = get_post($post_id);
                    echo $queried_post->post_content;
                    ?>

                <span class="usa-made">PROUDLY MADE IN<img src="https://dethloffmfg.com/core/media/american_flag.png" alt="Made in the USA"> THE UNITED STATES</span>
            </article>

        </div>
</section>

<?php get_footer();