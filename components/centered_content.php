<section id="centered_content-<?php echo $currItem; ?>" class="centered_content">
  <div class="container">
    <div class="row text-center">
      <div class="col-12 col-md-8 offset-md-2">
        <?php echo get_sub_field('text'); ?>
        <?php if( have_rows('buttons') ):  ?>
        <div class="button-wrapper mt-2">
          <?php while( have_rows('buttons') ) : the_row();
          $button = get_sub_field('button'); ?>
          <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"
            class="btn <?php echo get_sub_field('class') ? get_sub_field('class') : ''; ?>"><?php echo $button['title'] ?></a>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>