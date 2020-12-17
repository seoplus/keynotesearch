<?php

/**
 * Template name: About page
 * 
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


get_template_part('components/page-header'); ?>

<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">
    <?php

        if (have_rows('flexible_content')) {
            $currItem = 0;
            while (have_rows('flexible_content')) {
                the_row();
                $currItem++;
                $componentFile = get_stylesheet_directory() . '/components/' . get_row_layout() . '.php';
                if (file_exists($componentFile)) {
                    include $componentFile;
                    wp_reset_postdata();
                }
            };
        }; 

        ?>

  </main>

</div>

</div><!-- #page-wrapper -->

<?php get_footer(); ?>