<?php get_header(); ?>

  <div id="gallery">
    <?php $args = array('numberposts' => -1, 'orderby' => 'rand'); query_posts($args); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div id="postcard-<?php the_ID(); ?>" <?php post_class('postcard'); ?>>
        <a class="ajax" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('thumb-200');
          } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/dada-fallback200.jpg" alt="<?php the_title(); ?>" class="fallback" />
          <?php } ?>
        </a>
      </div>

    <?php endwhile; endif; ?>

  </div>
  <div id="post-content" class="lightbox"></div>
  <div id="container"></div>
<?php get_footer(); ?>
