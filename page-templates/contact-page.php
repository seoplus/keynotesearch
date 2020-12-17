<?php

/**
 * Template name: Contact page
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
          <div class="col-12 ">
            <div class="text-wrapper mb-4 pb-2">
              <?php echo get_field('send_message_text') ?>
            </div>
          </div>
          <div class="col-12 col-md-7 mb-5 mb-md-0">
            <div class="form-wrapper">
              <?php echo get_field('form_shortcode') ? get_field('form_shortcode') : 'missing form code'; ?>
            </div>
          </div>
          <div class="col-12 col-md-5">
            <div class="contact-tpyes-wrapper">
              <?php if( have_rows('contact_types') ):
            while( have_rows('contact_types') ) : the_row();?>
              <div class="item-wrapper">
                <div class="contacts-icon">
                  <span class="fa <?php echo get_sub_field('icon'); ?>"></span>
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



    <?php $location = get_field('location'); ?>
    <section class="location">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-5 mb-5 mb-md-0">
            <?php echo wp_get_attachment_image( $location['image']['ID'], 'large' ); ?>
          </div>
          <div class="col-12 col-md-7">
            <?php echo $location['text']; ?>
          </div>
        </div>
      </div>
    </section>


    <section class="map">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="iframe-wrapper">
              <?php echo get_field('map_iframe'); ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php $people_and_technology = get_field('people_and_technology'); ?>
    <section class="people-and-technology">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-7 mb-5 mb-md-0">
            <?php echo $people_and_technology['text']; ?>
          </div>
          <div class="col-12 col-md-5">
            <?php echo wp_get_attachment_image( $people_and_technology['image']['ID'], 'large' ); ?>
          </div>
        </div>
      </div>
    </section>

    <section class="other-locations">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="other-cities">
              <?php if( have_rows('other_cities') ):
            while( have_rows('other_cities') ) : the_row();?>
              <div class="other-city">
                <?php if(!empty(get_sub_field('link')['url'])) : ?>
                <a href="<?php echo get_sub_field('link')['url'] ?>">
                  <?php endif; ?>

                  <figure>
                    <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'medium' ); ?>
                  </figure>
                  <h4><?php echo get_sub_field('title'); ?></h4>

                  <?php if(!empty(get_sub_field('link')['url'])) : ?>
                </a>
                <?php endif; ?>
                <div class="text">
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





    <section id="testimonials-<?php echo $currItem; ?>" class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="intro text-center mb-5"><?php echo get_field('testimonials_text'); ?></div>
            <div class="swiper-container testimonies-wrapper">

              <div class="swiper-wrapper">

                <?php if( have_rows('testimonials') ):
            while( have_rows('testimonials') ) : the_row(); ?>
                <div class="swiper-slide testimony text-center">
                  <div class="content">
                    <?php echo get_sub_field('text') ?>
                  </div>
                  <div class="author mt-4"><?php echo get_sub_field('author') ?></div>
                  <div class="role mt-2">
                    <?php echo get_sub_field('role') ?><?php if(get_sub_field('company')) : ?> -
                    <a href="<?php echo get_sub_field('company')['url']; ?>"
                      target="_blank"><?php echo get_sub_field('company')['title']; ?></a><?php endif; ?>
                  </div>
                </div>
                <?php endwhile;
            endif; ?>

              </div>
              <div class="swiper-arrow swiper-button-prev">
                <svg width="18" height="33" viewBox="0 0 18 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.8114 1.88691L1.99997 16.6983L16.8114 31.5098" stroke="black" stroke-width="1.5"
                    stroke-linecap="square" />
                </svg>
              </div>
              <div class="swiper-arrow swiper-button-next">
                <svg width="18" height="33" viewBox="0 0 18 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 1.88691L16.8114 16.6983L2 31.5098" stroke="black" stroke-width="1.5"
                    stroke-linecap="square" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

</div>

</div><!-- #page-wrapper -->

<?php get_footer(); ?>