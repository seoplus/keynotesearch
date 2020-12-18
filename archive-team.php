<?php


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


get_template_part(
  'components/page-header', 
  'options', 
  array(
    'page_header' => get_field('team_members_header', 'options'),
    'featured_image_ID' =>  get_field('team_members_featured_image', 'options')['ID'],
  )
);

  wp_reset_postdata();
?>


<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">
    <?php $departments = array('leadership', 'delivery'); ?>

    <?php foreach($departments as $department) { ?>

    <section class="teams leadership-team">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <?php echo get_field($department.'_team_intro', 'options') ?>
          </div>
          <div class="col-12">
            <div class="team-members-wrapper">
              <?php $args = array(
              'post_type'		=> 'team',
              'meta_key'		=> 'team',
              'meta_value'	=> $department,
              'posts_per_page' => -1
            );
            
            $query = new WP_Query( $args );
            
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                  $query->the_post(); ?>
              <div class="team-member">
                <div class="image-social">
                  <a href='<?php echo get_the_permalink(); ?>'>
                    <figure>
                      <?php echo get_field('headshot') ? wp_get_attachment_image( get_field('headshot')['ID'], 'team-member' )  : get_the_post_thumbnail(get_the_ID(), 'team-member'); ?>
                    </figure>
                  </a>
                  <div class="social">
                    <ul>
                      <li><a href="<?php echo get_field('linkedin'); ?>" target="_blank"><i
                            class="fa fa-linkedin"></i></a></li>
                      <li><a href="mailto:<?php echo get_field('email'); ?>"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="info text-center">
                  <h4>
                    <a href='<?php echo get_the_permalink(); ?>'>
                      <?php echo get_the_title(); ?>
                    </a>
                  </h4>
                  <p class="text-uppercase"><?php echo get_field('role'); ?></p>
                </div>
              </div>
              <?php 
                }
              }
              wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php } //end foreach

    // Check value exists.
    if (have_rows('team_components', 'options')) {
        $currItem = 0;
        // Loop through rows.
        while (have_rows('team_components', 'options')) {
            the_row();
            $currItem++; //used to avoid duplicate ids on html elements

            //includes all the layouts that were used by the user in the order that they used it.
            // located in the components folder only if it exists
            $componentFile = get_stylesheet_directory() . '/components/' . get_row_layout() . '.php';
            if (file_exists($componentFile)) {
                include $componentFile;
                wp_reset_postdata();
            }
            // End loop.

        }; //endwhile

    }; //endif

    ?>
  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>