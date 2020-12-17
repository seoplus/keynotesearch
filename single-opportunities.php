<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

get_template_part('/components/post-header');

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

    <?php if( have_rows('learn_more') ): ?>
    <section class="container learn-more">
      <div class="row">
        <div class="col-12">
          <h3 class="text-center line">
            <?php echo get_field('tagline'); ?>
          </h3>
        </div>
        <?php while( have_rows('learn_more') ) : the_row();?>
        <div class="col-12 col-md-4 mt-3">
          <h4><?php echo get_sub_field('title'); ?></h4>
          <p><?php echo get_sub_field('text'); ?></p>
        </div>
        <?php endwhile; ?>
      </div>
    </section>
    <?php endif; ?>

    <?php $main_content = get_field('main_content'); ?>
    <section class="container opportunity-info">
      <div class="row">
        <div class="col-12">
          <h2 class="text-center mb-4"><?php echo get_the_title(); ?></h2>
        </div>
        <div class="col-12 col-md-6 mb-5 mb-md-0">
          <?php if($main_content['image']) : ?>
          <?php echo wp_get_attachment_image( $main_content['image']['ID'], 'large' ); ?>
          <?php endif; ?>
        </div>
        <div class="col-12 col-md-6">
          <div class="company-position-location">
            <?php if($main_content['company']) : ?>
            <h4 class="item company">Company: <span><?php echo $main_content['company']; ?></span>
            </h4>
            <?php endif; ?>
            <?php if($main_content['position']) : ?>
            <h4 class="item position">Position: <span><?php echo $main_content['position']; ?></span></h4>
            <?php endif; ?>
            <?php if($main_content['location']) : ?>
            <h4 class="item location">Location: <span><?php echo $main_content['location']; ?></span></h4>
            <?php endif; ?>
          </div>
          <div class="position-description mt-3">
            <?php echo $main_content['description'] ? $main_content['description'] : ''; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="skills container">
      <div class="row">
        <div class="col-12">
          <h2 class="text-center mb-4">Skills & Experience</h2>
          <div class="skills-wrapper">
            <?php if( have_rows('skills_&_experience') ):
            while( have_rows('skills_&_experience') ) : the_row();?>
            <div class="skill">
              <div class="title mb-3">
                <i class="fa fa-check-circle"></i>
                <h3><?php echo get_sub_field('title'); ?></h3>
              </div>
              <p class="mb-0"><?php echo get_sub_field('text'); ?></p>
            </div>
            <?php endwhile;
          endif; ?>
          </div>
        </div>
      </div>
    </section>

    <?php if(get_field('summary_of_role')) : ?>
    <section class="summary container">
      <div class="row">
        <div class="col-12">
          <h2 class="mb-4">Summary of the Role</h2>
          <?php echo get_field('summary_of_role'); ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <section class="need-help container">
      <div class="row">
        <div class="col-12">
          <div class="cta-wrapper">
            <h3>Interested in this opportunity? Send us your resume!</h3>
            <a class="btn" href='mailto:info@keynotesearch.com'>
              Apply now
            </a>
          </div>
        </div>
      </div>
    </section>


    <?php 	} 
    } 
    ?>
  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>