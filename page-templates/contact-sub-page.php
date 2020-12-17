<?php

/**
 * Template name: Contact sub page
 * 
 */ 

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


get_template_part('components/page-header'); ?>

<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">

    <section class="contact-types">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="items">
              <?php if( have_rows('intro_contact_types') ):
            while( have_rows('intro_contact_types') ) : the_row();?>
              <div class="item-wrapper">
                <div class="contacts-icon">
                  <span class="fa fa-<?php echo get_sub_field('icon'); ?>"></span>
                </div>
                <div class="info">
                  <?php echo get_sub_field('text'); ?>
                </div>
              </div>
              <?php endwhile;
            endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="contact-form">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 mb-5 mb-md-0">
            <div class="text-wrapper">
              <?php echo get_field('send_message_text') ?>
            </div>
            <div class="form-wrapper">
              <?php echo get_field('form_shortcode') ? do_shortcode(get_field('form_shortcode')) : 'missing form shortcode'; ?>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <?php echo get_field('form_text'); ?>
          </div>
        </div>
      </div>
    </section>

    <?php $post_placement_support = get_field('post_placement_support'); ?>
    <section class="post-placement-success">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6  mb-5 mb-md-0">
            <?php echo $post_placement_support['text']; ?>

            <?php
            // group
            if( have_rows('post_placement_support') ): while( have_rows('post_placement_support') ) : the_row(); 
            
            ?>
            <?php if( have_rows('buttons') ):  ?>
            <div class=" button-wrapper">
              <?php while( have_rows('buttons') ) : the_row();
              $button = get_sub_field('button'); ?>
              <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"
                class="btn <?php echo get_sub_field('class') ? get_sub_field('class') : ''; ?>"><?php echo $button['title'] ?></a>
              <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <?php 
            // end group
            endwhile; endif;
            ?>
          </div>
          <div class="col-12 col-md-6">
            <?php echo wp_get_attachment_image( $post_placement_support['image']['ID'], 'large' ); ?>
          </div>
        </div>
      </div>
    </section>
  </main>

</div>

</div><!-- #page-wrapper -->

<?php get_footer(); ?>