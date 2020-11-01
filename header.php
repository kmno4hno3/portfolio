<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://kit.fontawesome.com/936a0994d9.js" crossorigin="anonymous"></script>

  <!-- schema.orgで構造化マークアップ -->

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <!-- 文字エンコーディング情報を出力 -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!-- 電話番号の自動リンク機能を無効化 -->
    <meta name="format-detection" content="telephone=no">
    <!-- レスポンシブ対応 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- IEでも常に標準モードで表示 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- SEOの設定テンプレート -->
    <?php get_template_part('seo-header'); ?>
    <!-- OGPの設定テンプレート -->
    <?php get_template_part('ogp'); ?>
    <!-- スタイルシートURLを出力 -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <!-- wp_headはテーマの</head>タグ直前に必ず挿入します -->
    <?php wp_head(); ?>
  </head>



  <?php wp_head(); ?>
</head>

<body class="drawer--top drawer">
  <!-- header -->
  <header class="header">

    <div class="_pcNone">
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

    <div class="inner--header">
      <div class="logo"><a href="#">
          <h1>Tatsuo Web Design</h1>
        </a></div>
      <div class="nav--header _pcOnly">
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