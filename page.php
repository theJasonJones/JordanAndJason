<?php get_header(); the_post(); $featured = jj_get_featured_image( get_the_ID(), 'top_header_image' ); $f = get_fields(); ?>
  <div class="bg-wrapper" style="background-image: url(<?php echo ( ( !empty( $featured ) ) ? $featured : '' ); ?>);">
    <div class="container text">
      <h1><?php the_title() ?></h1>
      <div class="divider"></div>
      <div><?php echo $f['quote'] ?><em><?php echo $f['source'] ?></em></div>
    </div>
  <div class="overlay"></div>
</div>
  <div class="container content">
    <div class="entry">
      <?php the_content(); ?>
    </div>
  </div>
<?php get_footer(); ?>