<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tatsuo Web Design</title>
  <?php wp_head(); ?>
</head>

<body>
  <!-- header -->
  <header class="header">

    <div class="header-inner">
      <!-- <div class="header-logo"><a href="#"><h1>Tatsuo Web Design</h1></a></div> -->
      <h1>Tatsuo Web Design</h1>


      <div class="header-nav">
        <nav class="nav">
          <?php
          wp_nav_menu(array(
            'depth'=> 1,
            'thema_location' => 'global',
            'container' => false,
            'menu_class' => 'nav__list'
          ));
        ?>
        </nav>
      </div>
    </div>
  </header><!-- /header -->