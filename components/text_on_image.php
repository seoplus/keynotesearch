<section id="text_on_image-<?php echo $currItem; ?>" class="text-on-image-section">
  <div class="container">
    <div id="<?php echo slugify(get_sub_field('title')); ?>" class="row">
      <div class="col-12">
        <div class="text-on-image-wrapper <?php echo get_sub_field('overlay_color'); ?>">
          <figure>
            <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
          </figure>
          <div
            class="image-overlay <?php echo get_sub_field('overlay_color'); ?> d-flex justify-content-center align-items-center">
            <h3><?php echo get_sub_field('title'); ?></h3>
            <p><?php echo get_sub_field('text'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>