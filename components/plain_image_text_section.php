<section id="plain_image_text_section-<?php echo $currItem; ?>"
  class="plain_image_text_section position-relative <?php echo get_sub_field('broder_bottom') ? 'bottom-border' : ''; ?>">
  <div
    class="row no-gutters align-items-stretch <?php echo get_sub_field('image_on_left_or_right') != 'right' ? '' : 'justify-content-end'; ?>">
    <?php if(get_sub_field('image_on_left_or_right') == 'left') : ?>
    <div class="col-12 col-md-6 image d-flex align-items-center">
      <figure>
        <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
      </figure>
    </div>
    <?php endif; ?>

    <div
      class="col-12 col-md-4 offset-md-1 text d-flex align-items-center <?php echo get_sub_field('image_on_left_or_right') != 'right' ? '' : 'justify-content-md-end'; ?>">
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
    <div class="col-12 col-md-6 offset-md-1 image d-flex align-items-center">
      <figure>
        <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
      </figure>
    </div>
    <?php endif; ?>
  </div>
</section>