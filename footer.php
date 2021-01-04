<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer class="wrapper" id="wrapper-footer">

  <div class="container">
    <div class="row">
      <div class="col-12 justify-content-center d-flex">
        <?php if ( is_active_sidebar( 'footer-menu' ) ) : ?>
        <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
          <?php dynamic_sidebar( 'footer-menu' ); ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-3">
        <?php if ( is_active_sidebar( 'footer-logo' ) ) : ?>
        <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
          <a href="<?php echo get_bloginfo('url'); ?>"><?php dynamic_sidebar( 'footer-logo' ); ?></a>
        </div>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-3">
        <div class="copy-right">
          <div> &copy; <a href="<?php echo get_bloginfo('url'); ?>"><?php echo get_bloginfo('name'); ?></a>
            <?php echo date("Y"); ?></div>
          <div>KEYNOTE SEARCH</div>
          <div>Find. Fit. Perform.</div>
        </div>

      </div>
      <div class="col-12 col-md-3">
        <?php if ( is_active_sidebar( 'footer-submenu' ) ) : ?>
        <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
          <?php dynamic_sidebar( 'footer-submenu' ); ?>
        </div>
        <?php endif; ?>

      </div>
      <div class="col-12 col-md-3">
        <ul class="social">
          <?php 
        if( have_rows('social_media', 'options') ):
            while( have_rows('social_media', 'options') ) : the_row(); ?>
          <li>
            <a href="<?php echo get_sub_field('link'); ?>" target="_blank">
              <i class="fa fa-<?php echo get_sub_field('platform'); ?>"></i>
            </a>
          </li>
          <?php endwhile;
        endif;
        ?>
        </ul>
      </div>
    </div>
  </div>

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<a href="#top" id="toTop" class="show"><i class="fa fa-chevron-up"></i></a>

<?php wp_footer(); ?>

<!-- Linkedin insight tag -->
<script type="text/javascript">
_linkedin_partner_id = "979140";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script>
<script type="text/javascript">
(function() {
  var s = document.getElementsByTagName("script")[0];
  var b = document.createElement("script");
  b.type = "text/javascript";
  b.async = true;
  b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
  s.parentNode.insertBefore(b, s);
})();
</script>
<noscript>
  <img height="1" width="1" style="display:none;" alt=""
    src="https://px.ads.linkedin.com/collect/?pid=979140&fmt=gif" />
</noscript>
<!-- end Linkedin insight tag -->
</body>

</html>