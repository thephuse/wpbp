<?php if(is_home()) { ?>
  <h2>Blog</h2>
<? } else if(is_category()) { ?>
  <h2><?php single_cat_title(); ?></h2>
<? } else if(is_tag()) { ?>
  <h2><?php single_tag_title(); ?></h2>
<? } else if(is_search()) { ?>
  <h2>Here's what we found for "<?php the_search_query() ?>":</h2>
<? } else if(is_author()) { ?>
  <?php the_post(); ?>
  <h2>Posts by <?php the_author() ?></h2>
  <?php rewind_posts(); ?>
<? } ?>