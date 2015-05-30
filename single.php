<?php get_header(); ?>

  <div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div id="postcard-<?php the_ID(); ?>" class="entry">
        <div class="close">Close</div>
        <div id="inner-content">
          <div class="info">
            <h2><?php the_title(); ?></h2>
            <?php echo get_post_meta( $post->ID, 'text', true ); ?>
          </div>
          <div class="media">
            <?php
            $imageID = get_post_meta($post->ID, 'image', true);
            $video   = get_post_meta($post->ID, 'video', true);
            $audioID = get_post_meta($post->ID, 'audio', true);

            if ( !empty($imageID) ) {
              echo wp_get_attachment_image($imageID, 'large');
            }
            elseif ( !empty($video) ) {
              echo $video;
            }
            elseif ( !empty($audioID) ) {
              $audioURL = wp_get_attachment_url($audioID);
              ?>
              <audio controls>
                <source src="<?php echo $audioURL; ?>" type="audio/mpeg">
                Your browser does not support the audio element.
              </audio>
            <?php } ?>

          </div>
        </div>

    <?php endwhile; endif; ?>

  </div><!-- end content -->

<?php get_footer(); ?>