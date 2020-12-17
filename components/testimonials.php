<?php 

$testimonies = get_sub_field('testimonies');
$testimonies_field_name = 'testimonies';
$intro_text = get_sub_field('text');

if(!empty($args['testimonies'])) {
  $testimonies = $args['testimonies'];
}

if(!empty($args['testimonies_field_name'])) {
  $testimonies_field_name = $args['testimonies_field_name'];
}

if(!empty($args['text'])) {
  $intro_text = $args['text'];
}

?>

<section id="testimonials-<?php echo $currItem; ?>" class="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="intro text-center mb-5"><?php echo $intro_text; ?></div>
        <?php $numOfSlides = count($testimonies); ?>
        <div
          class="swiper-container <?php echo $numOfSlides > 1 ? 'testimonies-wrapper' : 'single-testimonies-wrapper'; ?>">

          <div class="swiper-wrapper">

            <?php if( have_rows($testimonies_field_name) ):
            while( have_rows($testimonies_field_name) ) : the_row(); ?>
            <div
              class="swiper-slide <?php echo $numOfSlides > 1 ? '' : 'swiper-slide-active'; ?> testimony text-center">
              <div class="content">
                <?php echo get_sub_field('text') ?>
              </div>
              <div class="author mt-4"><?php echo get_sub_field('author') ?></div>
              <div class="role mt-2">
                <?php echo get_sub_field('role') ?><?php if(get_sub_field('company')) : ?> -
                <a href="<?php echo get_sub_field('company')['url']; ?>"
                  target="_blank"><?php echo get_sub_field('company')['title']; ?></a><?php endif; ?>
              </div>
            </div>
            <?php endwhile;
            endif; ?>

          </div>
          <?php if($numOfSlides > 1) : ?>
          <div class="swiper-arrow swiper-button-prev">
            <svg width="18" height="33" viewBox="0 0 18 33" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.8114 1.88691L1.99997 16.6983L16.8114 31.5098" stroke="black" stroke-width="1.5"
                stroke-linecap="square" />
            </svg>
          </div>
          <div class="swiper-arrow swiper-button-next">
            <svg width="18" height="33" viewBox="0 0 18 33" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 1.88691L16.8114 16.6983L2 31.5098" stroke="black" stroke-width="1.5"
                stroke-linecap="square" />
            </svg>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>