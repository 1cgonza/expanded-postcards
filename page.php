<?php get_header(); ?>

  <div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="postcard-<?php the_ID(); ?>">
      <div class="entry">
        <div class="close">Close</div>
        <div id="info-page">
          <?php the_content(); ?>
      </div>
    </div>

    <?php endwhile; endif; ?>
  </div>

<?php get_footer(); ?>