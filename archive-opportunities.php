<?php


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


get_template_part(
  'components/page-header', 
  'options', 
  array(
    'page_header' => get_field('opportunities_header', 'options'),
    'featured_image_ID' =>  get_field('opportunities_featured_image', 'options')['ID'],
  )
);

  wp_reset_postdata();
?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">

    <section class="article-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="articles-wrapper">
              <?php 

              if ( have_posts() ) {
                  while ( have_posts() ) { the_post(); ?>
              <article class="blog-article">
                <a href="<?php echo get_the_permalink(); ?>" class="image">
                  <figure>
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'medium') ?>
                  </figure>
                </a>
                <div class="info">
                  <a href='<?php echo get_the_permalink(); ?>'>
                    <h2 class="mb-3"><?php echo get_the_title(); ?></h2>
                  </a>
                  <div class="excerpt"><?php echo get_the_excerpt(); ?></div>
                  <div class="read-more mt-3">
                    <a class="btn btn-primary" href='<?php echo get_the_permalink(); ?>'>
                      Read More...
                    </a>
                  </div>
                </div>
              </article>
              <?php 
                  }
              }
              wp_reset_postdata();
          
              ?>
            </div>

            <div class="pagination-nav d-flex justify-content-center">
              <?php
              $big = 999999999; // need an unlikely integer
              
              echo paginate_links( array(
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'next_text' => '»',
                  'prev_text' => '«'
              ) );
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="need-help">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="cta-wrapper">
              <h3>Need help sourcing candidates for a role?</h3>
              <a class="btn" href='<?php echo get_bloginfo('url'); ?>/contact'>
                Send us a message
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