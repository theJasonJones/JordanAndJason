<?php 
/* Template Name: Fifty Fifty */
get_header(); the_post(); $featured = jj_get_featured_image( get_the_ID(), 'top_header_image' ); $f = get_fields(); ?>
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
    <?php if( !empty( $f['fifty']) ): ?>
    <div class="row">
        <?php foreach($f['fifty'] as $h => $half): ?>
          <div class="col-xs-12 col-sm-6">
            <?php echo $half['first_half'] ?>
          </div>
          <div class="col-xs-12 col-sm-6">
            <?php echo $half['second_half'] ?>
          </div>
        <?php 
          jj_break(($h+1),array('xs'=>1,'sm'=>2,'md'=>2,'lg'=>2));
          endforeach; 
        ?>
    </div>
     <?php endif; ?>
  </div>
<?php get_footer(); ?>