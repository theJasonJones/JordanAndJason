<?php 
/* Template Name: Home Template */
get_header(); the_post(); $jj = get_fields(); ?>
<div class="bg-wrapper" style="background-image: url(<?php echo $jj['background_image']['url'] ?>);">
  <div class="container text">
      <img src="<?php echo $jj['logo']['sizes']['logo_resize'] ?>" class="img-responsive" alt="<?php bloginfo('name') ?>">
  </div>
  <div class="overlay"></div>
</div>
<div class="container">
  <div class="col-xs-12 content"> 
    <?php the_content(); ?>
  </div>
  <div class="details">
    <h2><?php echo $jj['wedding_details_heading']; ?></h2>
    <div class="divider"></div>
    <div>
      <?php echo $jj['short_details']; ?>
    </div>
    <a href="<?php get_permalink(61); ?>" class="base-btn"><?php echo $jj['button_text'] ?></a>
  </div>
  <div class="to-dos">
  <?php if( !empty( $jj['to_do_heading'] ) ): ?>
    <h2 class="to-do-heading"><?php echo $jj['to_do_heading'] ?></h2>
    <div class="divider"></div>
  <?php endif; ?>
  <?php 
    if( !empty( $jj['to_do_item'] ) ): 
      foreach ( $jj['to_do_item'] as $key => $do ):
  ?>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <a href="<?php echo get_permalink( $do['page']->ID ); ?>">
        <?php $item_featured_img = jj_get_featured_image( $do['page']->ID, 'to_dos' ) ?>
        <div class="to-do-item" style="background-image: url(<?php echo $item_featured_img ?>)">
          <h3><?php echo $do['page']->post_title ?></h3>
          <div class="overlay"></div>
        </div>
      </a>
    </div>
  <?php 
      endforeach;
    endif; 
  ?>
  </div>
</div>
<?php get_footer(); ?>