<?php

/**
 * Template name: Flexible Content 
 * @package understrap-child
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">
    <?php

        // Check value exists.
        if (have_rows('components')) {
            $currItem = 0;
            // Loop through rows.
            while (have_rows('components')) {
                the_row();
                $currItem++; //used to avoid duplicate ids on html elements

                //includes all the layouts that were used by the user in the order that they used it.
                // located in the components folder only if it exists
                $componentFile = get_stylesheet_directory() . '/layouts/' . get_row_layout() . '.php';
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