<?php 
  /* Template Name: About Page */
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
    <?php 
      if( !empty( $f['about_section'] ) ): 
        foreach( $f['about_section'] as $a => $about ):
    ?>
      <div class="row">
        <?php if( !empty( $about['top_image'] ) ): ?>
        <div class="col-xs-12 center-img">
            <img src="<?php echo $about['top_image']['sizes']['to_dos'] ?>" class="center-block img-responsive" alt="Jordan and Jason">
        </div>
       <?php endif; ?>
        <div class="col-xs-12 col-sm-6 half">
          <h2><?php echo $about['first_section_title'] ?></h2>
          <div class="divider"></div>
          <?php echo $about['first_section_paragraph'] ?>
        </div>
        <div class="col-xs-12 col-sm-6 half">
          <h2><?php echo $about['second_section_title'] ?></h2>
          <div class="divider"></div>
          <?php echo $about['second_second_paragraph'] ?>
        </div>
      </div>
    <?php 
        endforeach;
      endif; 
    ?>
  </div>
<?php get_footer(); ?>
