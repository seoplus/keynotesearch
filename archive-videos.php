<?php


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


get_template_part(
  'components/page-header', 
  'options', 
  array(
    'page_header' => get_field('videos_header', 'options'),
    'featured_image_ID' =>  get_field('videos_featured_image', 'options')['ID'],
  )
);

  wp_reset_postdata();
?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">
    <?php include get_stylesheet_directory() . '/components/breadcrumbs.php'; ?>

    <section class="article-section">
      <div class="container">
        <div class="row">
          <?php if(get_field('videos_intro_text', 'options')) : ?>
          <div class="col-12 mb-5">
            <?php echo get_field('videos_intro_text', 'options'); ?>
          </div>
          <?php endif; ?>
          <div class="col-12">
            <div class="articles-wrapper">
              <?php 

              if ( have_posts() ) {
                  while ( have_posts() ) { the_post(); ?>
              <article>
                <div class="article-header">
                  <a href='<?php echo get_the_permalink(); ?>'>
                    <figure>
                      <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                    </figure>
                    <h3 class="text-primary text-center"><?php echo get_the_title(); ?></h3>
                  </a>
                </div>
                <div class="buttons text-center mt-3">
                  <a class="btn arrow" href="<?php echo get_the_permalink(); ?>">View Video</a>
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

  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>