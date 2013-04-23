<?php query_posts('posts_per_page=3');
if (have_posts()) : ?>
	<h2>Recent Posts</h2>
	<ul>
		<?php while (have_posts()) : the_post(); ?>
		<li>
			<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('smthumb');
			} else { ?>
				<img src="<?php bloginfo('template_url'); ?>/images/default.png" alt="" />
			<?php } ?>
			<p class="excerpt">
				<?php if($post->post_excerpt) {
					the_excerpt();
				} else {
					custom_excerpt(16);
				}?>
			</p>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<?php endif;
wp_reset_query(); ?>