<?php 

$opportunities_text = get_sub_field('opportunities_text');
$news_text = get_sub_field('news_text');

if(!empty($args['opportunities_text'])) {
  $opportunities_text = $args['opportunities_text'];
}

if(!empty($args['news_text'])) {
  $news_text = $args['news_text'];
}

$news_args = array (
  'post_type' => 'news',
  'post_status' => 'publish',
  'posts_per_page' => 5,
);

$new_query = new WP_Query( $news_args );


$opportunities_args = array (
  'post_type' => 'opportunities',
  'post_status' => 'publish',
  'posts_per_page' => 3,
);

$opportunities_query = new WP_Query( $opportunities_args );

?>
<section id="news_and_latest_opportunities-<?php echo $currItem; ?>" class="news_and_latest_opportunities">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="intro text-center mb-5">
          <?php echo $news_text; ?>
        </div>
        <div class="articles-wrapper news-items">
          <div class="featured w-100 w-md-50">
            <?php $featured_post = $new_query->posts[0]; ?>
            <article>
              <a href="<?php echo get_the_permalink($featured_post->ID); ?>">
                <figure class="image">
                  <?php echo get_the_post_thumbnail($featured_post->ID, 'medium'); ?>
                </figure>
              </a>
              <div class="content">
                <h4><a
                    href="<?php echo get_the_permalink($featured_post->ID); ?>"><?php echo get_the_title($featured_post->ID); ?></a>
                </h4>
                <div class="date mt-3 mb-3"><i
                    class="fa fa-clock-o mr-1"></i><?php echo get_the_date('l, F d, Y', $featured_post->ID); ?> <i
                    class="fa fa-folder-open mr-1 ml-1"></i> News</div>
                <?php echo wp_trim_words(get_the_excerpt($featured_post->ID), 20, '...'); ?>
                <div class="button mt-3">
                  <a href="<?php echo get_the_permalink($featured_post->ID); ?>" class="btn">Read More...</a>
                </div>
              </div>
            </article>
          </div>
          <div class="non-featured w-100 w-md-50">
            <?php 
          
 
          if ( $new_query->have_posts() ) {
          
              while ( $new_query->have_posts() ) {
                  $new_query->the_post();

                  if($new_query->current_post == 0) {
                    continue;
                  }
                  
                  ?>
            <article>
              <a href="<?php echo get_the_permalink(); ?>">
                <figure class="image">
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
                </figure>
                <div class="content">
                  <h4><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></h4>
                </div>
              </a>
            </article>
            <?php  }
          
          }
          wp_reset_postdata();

          ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 mt-5 mt-md-0">
        <div class="intro text-center  mb-5">
          <?php echo $opportunities_text; ?>
        </div>
        <div class="articles-wrapper opportunities-items">
          <?php 
          
          if ( $opportunities_query->have_posts() ) {
          
              while ( $opportunities_query->have_posts() ) {
                  $opportunities_query->the_post();?>

          <article>
            <a href="<?php echo get_the_permalink(); ?>">
              <figure class="image">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
              </figure>
              <div class="content">
                <h4 class="mb-2"><?php echo get_the_title(); ?></h4>
                <?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?>
              </div>
            </a>
          </article>

          <?php }
          
          }
          wp_reset_postdata();

          ?>
        </div>
      </div>
    </div>

  </div>
</section>