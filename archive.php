<?php


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


$blog_page = get_posts(array(
    'post_type' => 'page',
    'fields' => 'ids',
    'meta_key' => '_wp_page_template',
    'meta_value' => '	page-templates/blog-archive.php'
)); 

$blog_page_ID = $blog_page[0];

get_template_part(
  'components/page-header', 
  'options', 
  array(
    'page_header' => ['title' => get_the_archive_title()],
    'featured_image_ID' =>  get_post_thumbnail_id($blog_page_ID),
  )
);

  wp_reset_postdata();
?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">
    <?php include get_stylesheet_directory() . '/components/breadcrumbs.php'; ?>

    <section id="blog" class="article-section blog">
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
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'large') ?>
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
              <h3>Categories</h3>
              <?php foreach(get_field('blog_sidebar_categories', 'options') as $item_id) {?>

              <?php 
              $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category__in' => $item_id,
                'posts_per_page' => 10,
              );
              
              $query = new WP_Query( $args );
              
              if ( $query->have_posts() ) { ?>
              <div class="side-cat">
                <h3><?php echo get_category($item_id)->name; ?></h3>
                <ul>
                  <?php while ( $query->have_posts() ) { ?>
                  <li>
                    <a href='<?php echo get_the_permalink(); ?>'>
                      <?php echo get_the_title(); ?>
                    </a>
                  </li>
                  <?php $query->the_post();
                    } ?>
                </ul>
                <hr>
                <a href="<?php echo get_category_link($item_id); ?>">View All »</a>
              </div>
              <?php }
              
              wp_reset_postdata(); ?>

              <?php } ?>
            </aside>
          </div>
        </div>
      </div>
    </section>

    <section class="blog-categories">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3 class="line text-center">Blog Categories</h3>
          </div>
          <div class="col-12">
            <div class="featured-blog-categories">
              <?php 
            if( have_rows('blog_featured_categories', 'options') ):
              while( have_rows('blog_featured_categories', 'options') ) : the_row();?>
              <div class="featured-blog-cagetory">
                <?php $cat_ID = get_sub_field('category'); ?>
                <a href="<?php echo get_category_link($cat_ID); ?>">
                  <figure>
                    <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'medium' ); ?>
                  </figure>
                  <div class="content">
                    <h4><?php echo get_category($cat_ID)->name; ?> »</h4>
                  </div>
                </a>

                <?php //var_dump(); ?>
              </div>
              <?php endwhile;
            endif;
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