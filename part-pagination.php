		<?php if(!is_404()) { ?>
			<div class="pagination">
				<?php if(is_single()) {
					echo '<div class="nav"><span class="prevbtn">';
					next_post('%', 'Next Post', 'no');
					echo '</span>';
					echo ' ';
					previous_post('%', 'Previous Post', 'no');
					echo '</div>';
				}?>
				
				<?php if(function_exists('wp_paginate')) {
					wp_paginate();
				} else {
					echo '<div class="nav"><span class="prevbtn">';
					previous_posts_link('Newer Posts');
					echo '</span>';
					echo ' ';
					next_posts_link('Older Posts');
					echo '</div>';
				} ?>
			</div>
		<? } ?>