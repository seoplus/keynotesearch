<section id="cta_banner-<?php echo $currItem; ?>" class="cta-banner">
  <div class="row align-items-center no-gutters">
    <div class="col-12 col-sm-5 col-md-3 offset-sm-1 offset-md-2 image align-self-end order-last order-sm-first">
      <figure>
        <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
      </figure>
    </div>
    <div class="col-12 col-sm-5 col-md-6 text text-center  order-first order-sm-last">
      <h3 class="text-white text-uppercase font-weight-bold"><?php echo get_sub_field('text') ?></h3>
      <a class="btn btn-blue" href='<?php echo get_sub_field('link')['url']; ?>'>
        <?php echo get_sub_field('link')['title']; ?>
      </a>
    </div>
  </div>
</section>