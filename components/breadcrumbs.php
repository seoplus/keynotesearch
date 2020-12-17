<?php  if ( function_exists('yoast_breadcrumb') ):?>
<section class="breadcrumbs pt-3 pb-3">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>