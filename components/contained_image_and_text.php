<section id="contained_image_text_section-<?php echo $currItem; ?>"
  class="contained_image_text_section position-relative">
  <div class="container">
    <div
      class="row <?php echo get_sub_field('image_on_left') ? 'flex-column-reverse flex-md-row' : 'justify-content-end '; ?>">
      <?php if(get_sub_field('image_on_left')) : ?>
      <div
        class="col-12 col-md-6 image <?php echo get_sub_field('align_content_center') ? 'd-flex flex-column align-items-center': ''; ?>">
        <figure>
          <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
        </figure>
        <?php echo get_sub_field('text_under_image') ? get_sub_field('text_under_image') : ''; ?>
      </div>
      <?php endif; ?>


      <div
        class="col-12 col-md-6 text d-flex mb-md-0 mb-5 <?php echo get_sub_field('image_on_left_or_right') != 'right' ? '' : 'justify-content-md-end'; ?> <?php echo get_sub_field('align_content_center') ? 'd-flex align-items-center': ''; ?>">
        <div class="text-wrapper text-md-white <?php echo !get_sub_field('image_on_left') ? 'pr-md-4' : 'pl-md-4'; ?>">
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

      <?php if(!get_sub_field('image_on_left')) : ?>
      <div
        class="col-12 col-md-6 image <?php echo get_sub_field('align_content_center') ? 'd-flex flex-column align-items-center': ''; ?>">
        <figure>
          <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
        </figure>
        <?php echo get_sub_field('text_under_image') ? get_sub_field('text_under_image') : ''; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>