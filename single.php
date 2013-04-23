<?php get_header(); ?>
			
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
			<article>
				<header>
					<h2><?php the_title(); ?></h2>
					<?php if ('post' == get_post_type()) { ?>
						<p class="meta">
							<?php the_date();?>
							By <?php the_author_posts_link(); ?>
							<?php the_category(', '); ?>
						</p>
					<?php } ?>
				</header>
				
				<?php the_content(); ?>
				
			</article>
			
			<?php endwhile; ?>
			
			<?php if ('post' == get_post_type()) { get_template_part('part','pagination'); } ?>

			<?php comments_template( '', true ); ?>

			<?php endif; ?>

<?php get_footer(); ?>