<?php

/**
 * Template name: Resources page
 * 
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


get_template_part('components/page-header'); ?>

<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">
    <section class="resource-cards-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="cards-wrapper">
              <?php if( have_rows('page_cards') ):
              while( have_rows('page_cards') ) : the_row();?>
              <div class="card-item">
                <a href="<?php echo get_sub_field('link')['url']; ?>">
                  <figure>
                    <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
                  </figure>
                  <div class="content text-center">
                    <h3><?php echo get_sub_field('title'); ?> <i class="fa fa-angle-double-right"></i></h3>
                    <?php echo get_sub_field('text'); ?>
                  </div>
                </a>
              </div>
              <?php endwhile;
              endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part(
    'components/news_and_latest_opportunities', 
      null, 
      array(
        'opportunities_text' => get_field('news_and_latest_opportunities')['opportunities_text'],
        'news_text' =>  get_field('news_and_latest_opportunities')['news_text'],
      )
    ); ?>


    <?php get_template_part(
    'components/testimonials', 
      null, 
      array(
        'testimonies' => get_field('testimonies'),
        'testimonies_field_name' =>  'testimonies',
        'text' =>  get_field('testimony_text'),
      )
    ); ?>



  </main>

</div>

</div><!-- #page-wrapper -->

<?php get_footer(); ?>