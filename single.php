<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

get_template_part(
  'components/page-header', 
  'options', 
  array(
    'page_header' => array(
      'title' => get_the_title(),
    ),
    'id' => 'post-header',
    'featured_image_ID' =>  !empty(get_field('header_image')) ? get_field('header_image')['ID'] : get_post_thumbnail_id(),
  )
);

global $wp_query;

?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">

    <?php 
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); ?>

    <?php get_template_part(
      'components/top_post_nav', 
      null, 
      array('post_type_name' => get_post_type_object($wp_query->queried_object->post_type)->labels->name)
    ); ?>
    <article class="container">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
          <div class="article-header">
            <h2><?php echo get_the_title(); ?></h2>
            <ul class="categories">
              <span class="separator">/</span><i class="fa fa-tags" aria-hidden="true"></i>
              <?php 
            $categories = get_the_category();
            foreach($categories as $category) {
              echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            ?>
            </ul>
          </div>
          <?php echo apply_filters( 'the_content', get_the_content() ) ?>
        </div>
      </div>
    </article>
    <?php get_template_part(
      'components/bottom_post_nav', 
      null, 
      array('post_type_name' => get_post_type_object($wp_query->queried_object->post_type)->labels->name)
    ); ?>
    <?php 	} 
    } 
    ?>
  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>