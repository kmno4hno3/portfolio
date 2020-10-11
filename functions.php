<?php

// CSSの読み込み
function register_stylesheet() { // 読み込むCSSを登録する
	wp_register_style('style', get_template_directory_uri().'/css/style.css');
}
 
function add_stylesheet() { // 登録したCSSを以下の順番で読み込む
	register_stylesheet();
	wp_enqueue_style('style', '', array(), '1.0', false); // ページの末尾で読み込ませるならtrue, head内ならfalse(デフォルトはfalse)
}
 
add_action('wp_enqueue_scripts', 'add_stylesheet');

// ナビゲーションメニュー有効か
register_nav_menu('header-nav', 'ヘッダーナビゲーション');
register_nav_menu('footer-nav', 'フッターナビゲーション');