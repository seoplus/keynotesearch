<section id="post-header" class="d-flex">
  <figure class="background-image">
    <?php echo get_the_post_thumbnail( get_the_ID(), 'post-header-image' ); ?>
  </figure>
  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-12 col-md-8 offset-md-2 text-white text-center">
        <h1><?php echo get_the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>