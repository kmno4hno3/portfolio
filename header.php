<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tatsuo Web Design</title>
  


  <?php wp_head(); ?>
</head>

<body class="drawer drawer--top">
  <!-- header -->
  <header class="header">

    <div class="header-drawer _pcNone">
      <button type="button" class="drawer-toggle drawer-hamburger">
        <span class="sr-only">toggle navigation</span>
        <span class="drawer-hamburger-icon"></span>
      </button>
      <nav class="drawer-nav" role="navigation">
        <?php
        $args = array(
          'container' => false,
          'thema_location' => 'header-nav',
          'depth' => 1,
          'fallback_cb' => false,
          'menu_class' => 'drawer-menu',
          'add_li_class' => 'drawer-menu-item'
        );
        wp_nav_menu($args);
        ?>
      </nav>
    </div>

    <div class="header-inner">
      <div class="header-logo"><a href="#">
          <h1>Tatsuo Web Design</h1>
        </a></div>
      <div class="header-nav _pcOnly">
        <nav class="nav">
          <?php
          wp_nav_menu(array(
            'depth' => 1,
            'thema_location' => 'global',
            'container' => false,
            'menu_class' => 'nav__list'
          ));
          ?>
        </nav>
      </div>
    </div>
  </header><!-- /header -->