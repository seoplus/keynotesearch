<?php $homepage_header = get_field('homepage_header'); ?>
<section id="homepage-header" class="position-relative">
  <div class="video-bg">
    <div class="iframe-wrapper">
      <div class="iframe" data-youtube-id="<?php echo $homepage_header['video_url']; ?>">
        <div id="videoIframe"></div>
      </div>
    </div>
    <div class="video-overlay">
      <?php echo get_the_post_thumbnail(); ?>
    </div>
  </div>
  <div class="container">
    <div class="row text-white">
      <div class="col-12">
        <div class="content-wrapper w-100">
          <h2><?php echo $homepage_header['title']; ?></h2>
          <h3><?php echo $homepage_header['subtitle']; ?></h3>
          <div class="header-text">
            <?php echo $homepage_header['text']; ?>
          </div>
          <?php if( have_rows('homepage_header') ):  ?>
          <?php while( have_rows('homepage_header') ) : the_row();?>

          <?php if( have_rows('buttons') ):  ?>
          <div class="button-wrapper">
            <?php while( have_rows('buttons') ) : the_row();
          $button = get_sub_field('button'); ?>
            <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"
              class="btn <?php echo get_sub_field('class') ? get_sub_field('class') : ''; ?>"><?php echo $button['title'] ?></a>
            <?php endwhile; ?>
          </div>
          <?php endif; ?>

          <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>