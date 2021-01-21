<?php


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


get_template_part(
  'components/page-header', 
  'options', 
  array(
    'page_header' => get_field('news_header', 'options'),
    'featured_image_ID' =>  get_field('news_featured_image', 'options')['ID'],
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
          <div class="col-12 col-md-8 mb-5 mb-md-0">
            <div class="articles-wrapper">
              <?php 

              if ( have_posts() ) {
                  while ( have_posts() ) { the_post(); ?>
              <article class="blog-article">
                <a href="<?php echo get_the_permalink(); ?>" class="image">
                  <figure>
                    <?php echo !empty(get_field('feed_image')) ? wp_get_attachment_image(get_field('feed_image')['ID'], 'large') : get_the_post_thumbnail(get_the_ID(), 'large') ?>
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
                  // 'total' => $query->max_num_pages ? $query->max_num_pages : $max_num_pages,
                  'next_text' => '»',
                  'prev_text' => '«'
              ) );
              ?>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <aside>
              <?php 
              $post_type = 'post';
              
              $args = array(
                'post_type' => $post_type,
                'post_status' => 'publish',
                'posts_per_page' => 10,
              );

              
              $query = new WP_Query( $args );
              
              $blog_page = get_posts(array(
                  'post_type' => 'page',
                  'fields' => 'ids',
                  'meta_key' => '_wp_page_template',
                  'meta_value' => '	page-templates/blog-archive.php'
              )); 

              $blog_page_ID = $blog_page[0];
              
              if ( $query->have_posts() ) { ?>
              <div class="side-cat">
                <h3>Latest <?php echo get_post_type_object($post_type)->labels->name; ?></h3>
                <ul>
                  <?php while ( $query->have_posts() ) { $query->the_post(); ?>
                  <li>
                    <a href='<?php echo get_the_permalink(); ?>'>
                      <?php echo get_the_title(); ?>
                    </a>
                  </li>
                  <?php 
                    } wp_reset_postdata(); ?>
                </ul>
                <hr>
                <a href="<?php echo get_the_permalink($blog_page_ID); ?>">View All »</a>
              </div>
              <?php }
              
               ?>

            </aside>
          </div>
        </div>
      </div>
    </section>

  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>