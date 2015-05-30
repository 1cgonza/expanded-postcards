<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title><?php wp_title(''); ?></title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <footer id="bottom">
    <section class="legend">
      <span class="legend-item ref-video">Video</span>
      <span class="legend-item ref-image">Image</span>
      <span class="legend-item ref-audio">Audio</span>
    </section>

    <nav class="nav">
      <a class="ajax" href="<?php echo get_site_url(); ?>/expanded/instructions/">Instructions</a>
      <a class="ajax" href="<?php echo get_site_url(); ?>/expanded/about/">About</a>
    </nav>
  </footer>