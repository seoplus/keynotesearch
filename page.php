<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header(null , array('header_class' => 'is-dark'));

$container = get_theme_mod('understrap_container_type');

?>

<div class="wrapper pb-0 pt-0" id="page-wrapper">
  <main class="site-main" id="main">

    <article class="page-content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="mb-4"><?php echo get_the_title(); ?></h1>
            <?php echo apply_filters( 'the_content', get_the_content() ) ?>
          </div>
        </div>
      </div>
    </article>
  </main>

</div>

</div><!-- #page-wrapper -->


<?php get_footer(); ?>