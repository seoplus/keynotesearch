<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php do_action('wp_body_open'); ?>
  <div class="site" id="page">

    <!-- ******************* The Navbar Area ******************* -->
    <header id="wrapper-navbar"
      class="thenav <?php echo is_user_logged_in() ? 'logged-in' : ''; ?> <?php echo !empty($args['header_class']) ? $args['header_class'] : ''; ?>"
      itemscope itemtype="http://schema.org/WebSite">


      <nav class="navbar navbar-expand-md navbar-dark">

        <?php if ('container' == $container) : ?>
        <div class="container">
          <?php endif; ?>

          <!-- Your site title as branding in the menu -->
          <?php if (!has_custom_logo()) { ?>

          <?php if (is_front_page() && is_home()) : ?>

          <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>"
              title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
              itemprop="url"><?php bloginfo('name'); ?></a></h1>

          <?php else : ?>

          <a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>"
            title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
            itemprop="url"><?php bloginfo('name'); ?></a>

          <?php endif; ?>


          <?php } else {
						the_custom_logo();
					} ?>
          <!-- end custom logo -->

          <a id="burgertoggler" href="#" class="order-2 navbar-toggler mr-2 mobile-square burger d-flex d-md-none"
            data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <div class="mobile-burger">
              <span class="burger-bars">
              </span>
            </div>
          </a>

          <!-- The WordPress Menu goes here -->
          <?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 4,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
          <?php if ('container' == $container) : ?>
        </div><!-- .container -->
        <?php endif; ?>

      </nav><!-- .site-navigation -->

    </header><!-- #wrapper-navbar end -->