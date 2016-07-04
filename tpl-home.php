<?php 
/* Template Name: Home Template */
get_header();  the_post(); $jj = get_fields(); ?>
<div class="bg-wrapper" style="background-image: url(<?php echo $jj['background_image']['url'] ?>);">
  <div class="container text">
      <img src="<?php echo $jj['logo']['sizes']['logo_resize'] ?>" class="img-responsive" alt="<?php bloginfo('name') ?>">
  </div>
  <div class="overlay"></div>
</div>
<div class="col-xs-12 content"> 
  <?php the_content(); ?>
</div>
<?php get_footer(); ?>