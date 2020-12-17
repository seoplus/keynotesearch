<div class="container new-prev">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
      <div class="navigation">
        <div class="prev-posts">
          <?php previous_post_link('%link', '<i class="fa fa-chevron-left" aria-hidden="true"></i> Previous '.$args['post_type_name']) ?>
        </div>
        <div class="next-posts">
          <?php next_post_link('%link', 'Next '.$args['post_type_name'].' <i class="fa fa-chevron-right" aria-hidden="true"></i>') ?>
        </div>
      </div>
    </div>
  </div>
</div>