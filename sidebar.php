		<aside class="sidebar">
      <?php if ( !function_exists('dynamic_sidebar')
      || !dynamic_sidebar(1) ) : ?>
      <?php endif ?>

      <?php if (is_post_type_archive('magazine') || 'magazine' == get_post_type()) { ?>
        <div class="widget">
        <h3>Magazine Issues</h3>
        <?php query_posts(array('post_type' => array('magazine'), 'posts_per_page'=>'99'));
          if (have_posts()) : ?>
          <ul>
          <?php while (have_posts()) : the_post(); ?>
            <?php
              global $more;    
              $more = 0;
            ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php
          endwhile; ?>
          </ul>
          <?php endif;
          wp_reset_query(); ?>
        </div>
      <? } ?>

			<?php if ( !function_exists('dynamic_sidebar')
			|| !dynamic_sidebar(2) ) : ?>
			<?php endif ?>
		</aside>