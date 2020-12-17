<?php


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


get_template_part(
  'components/page-header', 
  'options', 
  array(
    'page_header' => get_field('industries_header', 'options'),
    'featured_image_ID' =>  get_field('industries_featured_image', 'options')['ID'],
  )
);

  wp_reset_postdata();
?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">

    <section class="industry-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="industries-wrapper">
              <?php 

              if ( have_posts() ) {
                  while ( have_posts() ) { the_post(); ?>
              <div class="industry">
                <?php if(get_field('dont_link_to_page')) : ?>
                <div class="industry-wrapper">
                  <?php else: ?>
                  <a class="industry-wrapper" href='<?php echo get_the_permalink(); ?>'>
                    <?php endif; ?>

                    <figure>
                      <?php echo get_the_post_thumbnail(get_the_ID(), 'medium') ?>
                    </figure>
                    <div class="info">
                      <h3 class="mb-3"><?php echo get_the_title(); ?></h3>

                      <div class="excerpt"><?php echo get_the_excerpt(); ?></div>
                    </div>
                    <?php if(get_field('dont_link_to_page')) : ?>
                </div>
                <?php else: ?>
                </a>
                <?php endif; ?>
              </div>
              <?php 
                  }
              }
              wp_reset_postdata();
          
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="need-help-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="cta-wrapper">
              <h3 class="text-white">Attract and enable the talent you need to succeed.</h3>
              <a class="btn" href='<?php echo get_bloginfo('url'); ?>/contact'>
                Contact Us
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>