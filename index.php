<?php get_header(); ?>
 <section class="col-xs-12">
    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="post">
                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php the_excerpt(); ?></p>
                  <ul class="post-meta no-bullet">
                    <li class="author">
                        <span class="wpt-avatar small">
                          <?php echo get_avatar( get_the_author_meta( 'ID' ), 24 ); ?>
                        </span>
                        by <?php the_author_posts_link(); ?>
                      </a>
                    </li>
                    <li class="cat">in <?php the_category(', '); ?></li>
                    <li class="date"> on <?php the_time('F j, Y'); ?></li> <!-- use the_time instead of the_date to prevent some dates note appearing-->
                  </ul>
                  <?php if( get_the_post_thumbnail() ): ?>
                  <div class="img-container">
                    <?php the_post_thumbnail('large'); ?>
                  </div>
                <?php endif; ?>
                </article>
            <?php endwhile; else: ?>

              <p><?php _e('Sorry, no posts here.'); ?></p>
              
    <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
</section>
<?php get_footer(); ?>