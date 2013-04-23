<?php get_header(); ?>
			<?php get_template_part('part','title'); ?>
			
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
			<article>
				<header>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php if('page'==get_post_type()) { } else { ?>
					<div class="meta">
						<?php echo get_the_date();?> <span>|</span>
						By <?php the_author_posts_link(); ?> <span>|</span>
						<?php the_category(', '); ?>
					</div>
					<? } ?>
				</header>
				<div class="excerpt">
					<a href="<?php the_permalink() ?>">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} else { ?>
							<img src="<?php bloginfo('template_url'); ?>/images/default.png" alt="" />
						<?php } ?>
					</a>
					<?php custom_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
				</div>
			</article>
			
			<?php endwhile; ?>
			
			<?php get_template_part('part','pagination'); ?>
			
			<?php else : ?>
				<?php get_template_part('part','404'); ?>
			
			<?php endif; ?>

<?php get_footer(); ?>