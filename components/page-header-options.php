<?php 

$page_header = $args['page_header'];
$featured_image_ID = $args['featured_image_ID'];
$id = !empty($args['id']) ? $args['id'] : null;

?>

<section id="<?php echo $id ? $id : 'page-header'; ?>" class="d-flex">
  <figure class="background-image">
    <?php echo wp_get_attachment_image($featured_image_ID, 'post-header-image'); ?>
  </figure>
  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-12 col-md-10 offset-md-1 text-white text-center">
        <h1><?php echo $page_header['title'] ? $page_header['title'] : get_the_title(); ?></h1>
        <?php if(!empty($page_header['subtitle'])) : ?><h2><?php echo $page_header['subtitle']; ?></h2><?php endif; ?>
      </div>
    </div>
  </div>
</section>