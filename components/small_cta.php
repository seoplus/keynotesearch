<section id="small_cta-<?php echo $currItem; ?>" class="small_cta">
  <div class="row no-gutters justify-space-between align-items-center">
    <div class="col-12 col-md-6 offset-md-1 text-center text-md-left">
      <h3 class=""><?php echo get_sub_field('text'); ?></h3>
    </div>
    <div class="col-12 col-md-2 offset-md-1 mt-3 mt-md-0 text-center text-md-left">
      <?php $button = get_sub_field('button') ?>
      <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"
        class="btn"><?php echo $button['title'] ?></a>
    </div>
  </div>
</section>