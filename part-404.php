			<article>
				<?php if(is_404()) { ?>
				<h2>Error 404</h2>
				<? } ?>
				<?php if(is_search()) { ?>
				<p>
					No matches found. Try again?
				</p>
				<? } else if(is_category() || is_tag()) { ?>
				<p>
					Content coming soon
				</p>
				<? } else { ?>
				<p>
					Sorry, there is nothing here. Try using the navigation or search bar at the top to find what you are looking for.
					Or, <a href="/contact">contact us</a> if you think there may be a problem with the site.
				</p>
				<? } ?>
			</article>