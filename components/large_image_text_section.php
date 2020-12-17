<section id="large_image_text_section-<?php echo $currItem; ?>"
  class="large_image_text_section position-relative <?php echo get_sub_field('broder_bottom') ? 'bottom-border' : ''; ?>">
  <figure class="mobile-image d-block d-md-none">
    <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
  </figure>
  <div
    class="image-overlay d-block d-md-none <?php echo get_sub_field('overlay_color'); ?> d-flex justify-content-center align-items-center">
  </div>
  <div
    class="row no-gutters align-items-center <?php echo get_sub_field('image_on_left_or_right') != 'right' ? '' : 'justify-content-end'; ?>">
    <?php if(get_sub_field('image_on_left_or_right') == 'left') : ?>
    <div class="col-12 col-md-6 image">
      <figure class="d-none d-md-flex">
        <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
      </figure>
      <div
        class="image-overlay <?php echo get_sub_field('overlay_color'); ?> d-flex justify-content-center align-items-center">
        <h3 class="text-white text-center">
          <?php echo get_sub_field('image_overlay_text') ? get_sub_field('image_overlay_text') :''; ?></h3>
      </div>
    </div>
    <?php endif; ?>


    <div
      class="col-12 col-md-4 offset-md-1 text d-flex <?php echo get_sub_field('image_on_left_or_right') != 'right' ? '' : 'justify-content-md-end'; ?>">
      <div class="text-wrapper text-md-white ">
        <?php echo get_sub_field('text'); ?>
        <?php if( have_rows('buttons') ):  ?>
        <div class="button-wrapper">
          <?php while( have_rows('buttons') ) : the_row();
          $button = get_sub_field('button'); ?>
          <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"
            class="btn <?php echo get_sub_field('class') ? get_sub_field('class') : ''; ?>"><?php echo $button['title'] ?></a>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if(get_sub_field('image_on_left_or_right') == 'right') : ?>
    <div class="col-12 col-md-6 offset-md-1 image">
      <figure>
        <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
      </figure>
      <div
        class="image-overlay <?php echo get_sub_field('overlay_color'); ?> d-flex justify-content-center align-items-center">
        <h3 class="text-white">
          <?php echo get_sub_field('image_overlay_text') ? get_sub_field('image_overlay_text') :''; ?></h3>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>