<?php 
/* Template Name: Home Template */
get_header(); the_post(); $jj = get_fields(); 
include('instagram.php');
?>
<div class="bg-wrapper" style="background-image: url(<?php echo $jj['background_image']['sizes']['home_image'] ?>);">
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
   <div class="row">
    <div class="col-xs-12 gram-top">
        <h2>#MrJonesAndMe17</h2>
        <div class="divider"></div>
        Add the <a href="https://www.instagram.com/explore/tags/mrjonesandme17/" target="blank">#MrJonesAndMe17</a> tag on instagram to get your photo to show up here.
    </div>
    <?php 
      $insta = Bolandish\Instagram::getMediaByHashtag("mrjonesandme17", 8);  

      foreach ($insta as $key => $gram):
    ?>
      <div class="col-xs-12 col-sm-6 col-md-3 instagram">
          <a href="https://www.instagram.com/p/<?php echo $gram->code ?>" target="_blank">
            <img data-original="<?php echo $gram->thumbnail_src ?>" class="img-responsive lazy" width="500" height="500">
          </a>
         <div class="caption"><?php echo $gram->caption ?></div>
         <div class="username"><a href="https://www.instagram.com/<?php echo $gram->owner->username ?>">@<?php echo $gram->owner->username ?></a></div>
      </div>
    <?php
      jj_break(($key+1),array('xs'=>1,'sm'=>2,'md'=>4,'lg'=>4));
      endforeach;
    ?>

  </div>
</div>
<script type="text/javascript">
  jQuery("img.lazy").lazyload();
</script>
<?php get_footer(); ?>
