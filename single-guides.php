<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header(null , array('header_class' => 'is-dark'));

$container = get_theme_mod('understrap_container_type');

global $wp_query;
?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">

    <?php 
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); 
     ?>
    <article class="container">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
          <div class="article-header">
            <figure>
              <h1 class="text-white text-center"><?php echo get_the_title(); ?></h1>
              <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
            </figure>
          </div>
          <?php echo apply_filters( 'the_content', get_the_content() ) ?>
          <div class="buttons">
            <a class="btn download" href="<?php echo get_field('external_link'); ?>" target="_blank">Download Guide</a>
          </div>
        </div>
      </div>
    </article>
    <?php get_template_part(
      'components/bottom_post_nav', 
      null, 
      array('post_type_name' => get_post_type_object($wp_query->queried_object->post_type)->labels->name)
    ); 
  
      } 
    } 
    ?>
  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>