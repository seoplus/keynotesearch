<section id="need_help-<?php echo $currItem; ?>" class="need-help-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="cta-wrapper text-white">
          <h3><?php echo get_sub_field('text'); ?></h3>
          <a class="btn" href='<?php echo get_sub_field('button')['url']; ?>'>
            <?php echo get_sub_field('button')['title']; ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>