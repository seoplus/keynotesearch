<?php $page_header = get_field('page_header'); ?>
<section id="page-header" class="d-flex">
  <figure class="background-image">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'post-header-image'); ?>
  </figure>
  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-12 col-md-10 offset-md-1 text-white text-center">
        <h1><?php echo $page_header['title'] ? $page_header['title'] :get_the_title(); ?></h1>
        <?php if($page_header['subtitle']) : ?><h2><?php echo $page_header['subtitle']; ?></h2><?php endif; ?>
        <a href="/contact" class="btn mt-3">Contact Us</a>
      </div>
    </div>
  </div>
</section>