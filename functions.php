<?php

// cssディレクトリのstyle.cssの読み込み
function register_stylesheet() { // 読み込むCSSを登録する
	wp_register_style('style', get_template_directory_uri().'/css/style.css');
}
 
// cssの読み込み順番を定義
function add_stylesheet() { // 登録したCSSを以下の順番で読み込む
	register_stylesheet();
	wp_enqueue_style('style', '', array(), '1.0', false); // ページの末尾で読み込ませるならtrue, head内ならfalse(デフォルトはfalse)
}
add_action('wp_enqueue_scripts', 'add_stylesheet');

// ナビメニューのliにclassを追加
function add_additional_class_on_li($classes, $item, $args){
  if(isset($args->add_li_class)){
    $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1,3);

// jsの読み込み
function my_scripts(){
  wp_enqueue_style('my-drawer-style', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css', array(), '3.2.2', false);  
  wp_enqueue_script('my-scroll-js', 'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('my-drawer-js', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('custom_script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts');


// ナビゲーションメニュー設定
function my_menu_init(){
  register_nav_menu('header-nav', 'ヘッダーナビゲーション');
  register_nav_menu('footer-nav', 'フッターナビゲーション');
}
add_action('init', 'my_menu_init');