<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

get_template_part('components/page-header', 'industries');

?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">

    <?php 
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); ?>


    <?php if (have_rows('first_section')) { 
        $currItem = 0; ?>
    <div class="first-section-wrapper">
      <?php while (have_rows('first_section')) {
        the_row();
        $currItem++;

        $componentFile = get_stylesheet_directory() . '/components/' . get_row_layout() . '.php';
        if (file_exists($componentFile)) {
            include $componentFile;
            wp_reset_postdata();
        }
      }; //endwhile ?>

    </div>
    <?php }; ?>

    <section class="common-roles">
      <div class="container">
        <div class="row">
          <?php if(get_field('common_roles_text')) : ?>
          <div class="col-12 mb-5">
            <div class="common-roles-text">
              <?php echo get_field('common_roles_text'); ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if( have_rows('common_roles') ): $count = 1; $numOfRows = count(get_field('common_roles'));?>
          <?php while( have_rows('common_roles') ) : the_row();?>
          <div
            class="col-12 col-md-<?php echo floor(12/$numOfRows); ?> <?php echo $count != $numOfRows ? 'mb-5 mb-md-0': ''; ?> common-role">
            <figure>
              <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'medium' ); ?>
            </figure>
            <div class="info">
              <h4 class="mb-3"><?php echo get_sub_field('title'); ?></h4>
              <?php echo get_sub_field('text'); ?>
            </div>
          </div>
          <?php $count++; endwhile; ?>
        </div>
      </div>
      <?php endif; ?>

    </section>

    <?php if (have_rows('bottom_section')) { 
        $currItem = 0; ?>
    <div class="bottom-section-wrapper">
      <?php while (have_rows('bottom_section')) {
        the_row();
        $currItem++;

        $componentFile = get_stylesheet_directory() . '/components/' . get_row_layout() . '.php';
        if (file_exists($componentFile)) {
            include $componentFile;
            wp_reset_postdata();
        }
      }; //endwhile ?>

    </div>
    <?php }; ?>


    <?php 	} 
    } 
    ?>

    <?php if(get_field('single_industries_contact', 'options')) : ?>
    <section class="end-form">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center mb-3">We look forward to augmenting your day-to-day with successful candidate
              placements!
              <a href="/contact">Contact us today to get started.</a>
            </h2>
          </div>
          <div class="col-12  col-md-10 offset-md-1">
            <?php echo get_field('single_industries_contact', 'options'); ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>