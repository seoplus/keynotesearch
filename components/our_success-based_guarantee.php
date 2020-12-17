<section id="our_success-based_guarantee-<?php echo $currItem; ?>"
  class="our_success-based_guarantee position-relative">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-12 col-md-4 offset-md-1 text d-flex mb-md-0 mb-5">
        <div class="text-wrapper text-md-white pr-md-4">
          <?php echo get_sub_field('content'); ?>
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

      <div class="col-12 col-md-6 offset-md-1 image">
        <figure>
          <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
        </figure>
      </div>
    </div>
  </div>
</section>