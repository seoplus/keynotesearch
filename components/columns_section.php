<section id="columns_section-<?php echo $currItem; ?>" class="columns-section">
  <div class="container">
    <div class="row">
      <?php 
      $numOfRows = count(get_sub_field('columns')); 
      $col = floor(12/$numOfRows); 
      ?>
      <?php if( have_rows('columns') ):
      $count = 1;
        while( have_rows('columns') ) : the_row();?>
      <div class="col-12 col-md-<?php echo $col; ?> <?php echo $count != $numOfRows ? 'mb-5 mb-md-0': ''; ?>">
        <?php if(get_sub_field('image')) : ?>
        <figure class="mb-4">
          <?php echo wp_get_attachment_image( get_sub_field('image')['ID'], 'large' ); ?>
        </figure>
        <?php endif; ?>
        <?php echo get_sub_field('content'); ?>
      </div>
      <?php 
        $count++;
        endwhile;
      endif; ?>

    </div>
  </div>
</section>