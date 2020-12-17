<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header(null , array('header_class' => 'is-dark'));

$container = get_theme_mod('understrap_container_type');

?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">

    <?php 
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); 
     ?>
    <section class="member-info-section">
      <div class="container">
        <div class="row member-info">
          <div class="col-12 col-md-6 mb-5 mb-md-0">
            <figure>
              <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
            </figure>
          </div>
          <div class="col-12 col-md-6">
            <h1><?php echo get_the_title(); ?></h1>
            <p class="role mt-2 mb-4"><?php echo get_field('role'); ?></p>
            <div class="description">
              <?php echo apply_filters( 'the_content', get_the_content() ) ?></div>
          </div>
        </div>


        <?php $contacts = array('phone' => 'Phone', 'email' => 'Email', 'linkedin' => 'Linkedin'); ?>
        <div class="row contact mt-5">
          <?php foreach($contacts as $key => $value) { ?>

          <?php if(get_field($key)) : ?>
          <div class="col-12 col-md-<?php echo floor(12/count($contacts)); ?> mb-4 mb-md-0">
            <div class="item-wrapper">
              <a
                href="<?php echo $key == 'phone' ? 'tel:'.get_field($key) : ($key == 'email' ? 'mailto:'.get_field($key) : get_field($key)); ?>">
                <div class="contacts-icon">
                  <span class="fa fa-<?php echo $key == 'email' ? 'envelope' : $key.'-square'; ?>"></span>
                </div>
              </a>
              <div class="info">
                <h4><?php echo $value; ?></h4>
                <a
                  href="<?php echo $key == 'phone' ? 'tel:'.get_field($key) : ($key == 'email' ? 'mailto:'.get_field($key) : get_field($key)); ?>">
                  <?php echo $key == 'linkedin' ? 'View Profile' : get_field($key); ?>
                </a>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php } ?>
        </div>
      </div>
    </section>

    <?php if(get_field('difference_section')) : ?>
    <section class="difference-section  <?php echo !have_rows('featured_media') ? 'bottom' : ''; ?>">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 mb-5 mb-md-0">
            <div class="iframe-wrapper">
              <?php echo get_field('difference_youtube_iframe'); ?>
            </div>
          </div>
          <div class="col-12 col-md-6 text-center">
            <?php echo get_field('difference_text'); ?>
            <?php if( have_rows('buttons') ):  ?>
            <div class="button-wrapper">
              <?php while( have_rows('buttons') ) : the_row();
          $button = get_sub_field('button'); ?>
              <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"
                class="btn <?php echo get_sub_field('class') ? get_sub_field('class') : ''; ?>"><?php echo $button['title'] ?></a>
              <?php endwhile; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>


    <?php if( have_rows('featured_media') ): ?>
    <section class="featured-media-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="intro text-center mb-5">
              <h3 class="line">Featured Meida</h3>
              <p>News and resources featuring <?php echo get_the_title(); ?>.</p>
            </div>
          </div>
          <div class="col-12">
            <div class="featured-media-wrapper">
              <?php while( have_rows('featured_media') ) : the_row();?>
              <div class="featured-media">
                <figure>
                  <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'medium' ); ?>
                </figure>
                <div class="info">
                  <h4 class="mb-3">
                    <a href='<?php echo get_sub_field('link'); ?>' target="_blank">
                      <?php echo get_sub_field('title') ?>
                    </a>
                  </h4>
                  <div class="description">
                    <?php echo get_sub_field('text') ?></div>
                </div>
              </div>
              <?php endwhile;?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php 
      } 
    } 
    ?>
  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>