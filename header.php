<!DOCTYPE html>
<html <?php language_attributes() ?> >

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template
    <?php bloginfo('name') ?>
  </title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo get_template_directory_uri() ?> /vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo get_template_directory_uri() ?> /css/blog-home.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri() ?> /style.css" rel="stylesheet">

</head>
  <?php wp_head() ?>
<body style="padding-top: 0">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark <?php echo is_home() ? 'mb-5' : '' ?>">
    <div class="container">
      <a class="navbar-brand" href="<?php echo home_url() ?>">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php 
          wp_nav_menu( array(
          'theme_location'  => 'header-menu', // Gọi menu đã đăng ký trong function
          'depth'           => 2,     // Cấu hình dropdown 2 cấp
          'container'       => false, // Thẻ div bọc menu
          'menu_class'      => 'navbar-nav ml-auto', // Class của nav bootstrap
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker()
          ));
        ?>
      </div>
    </div>
  </nav>

  <?php mini_blog_breadcrumbs() ?>