			<?php
      $args = array(
        'post_type' => 'slides',
        'orderby' => 'order',
        'order' => 'ASC',
        'numberposts' => '99'
      );
      $slides = get_posts($args);

      foreach($slides as $post) :
        setup_postdata($post);

        $output;
        $bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'rotator' );
        $content = get_the_content();

        $output .= '<div class="slide" style="background: url(';
        $output .= $bg[0];
        $output .= ');">';
        if ($content != null && $content != '') {
          $output .= '<span class="desc">';
          $output .= get_the_content();
          $output .= '</span>';
        }
        $output .= '</div>';

      endforeach;
      wp_reset_postdata();
      ?>

      <?php if($output != '') { ?>
      <div class="slider">
        <div class="slides_container">
          <? echo $output; ?>
        </div>
      </div>
      <? } ?>