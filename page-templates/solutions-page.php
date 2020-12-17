<?php

/**
 * Template name: Solutions page
 * 
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

 ?>

<?php 

$page_header = get_field('page_header');
$featured_image_ID = $page_header['image']['ID'];

?>
<section id="page-header" class="d-flex">
  <figure class="background-image">
    <?php echo $featured_image_ID ? wp_get_attachment_image($featured_image_ID, 'post-header-image') : get_the_post_thumbnail(get_the_ID(), 'post-header-image') ; ?>
  </figure>
  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-12 col-md-10 offset-md-1 text-white text-center">
        <h1><?php echo $page_header['title'] ? $page_header['title'] : get_the_title(); ?></h1>

        <?php if($page_header['subtitle']) : ?><h2><?php echo $page_header['subtitle']; ?></h2><?php endif; ?>

        <?php if($page_header['text']) : ?><p><?php echo $page_header['text']; ?></p><?php endif; ?>

        <?php if( have_rows('page_header') ):  while( have_rows('page_header') ) : the_row(); ?>
        <?php if( have_rows('buttons') ):  ?>
        <div class="button-wrapper">
          <?php while( have_rows('buttons') ) : the_row();
          $button = get_sub_field('button'); ?>
          <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"
            class="btn <?php echo get_sub_field('class') ? get_sub_field('class') : ''; ?>"><?php echo $button['title'] ?></a>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>

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