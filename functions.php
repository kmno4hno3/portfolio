<?php

// cssディレクトリのstyle.cssの読み込み
function register_stylesheet()
{ // 読み込むCSSを登録する
  wp_register_style('style', get_template_directory_uri() . '/css/style.css');
}

// cssの読み込み順番を定義
function add_stylesheet()
{ // 登録したCSSを以下の順番で読み込む
  register_stylesheet();
  wp_enqueue_style('style', '', array(), '1.0', false); // ページの末尾で読み込ませるならtrue, head内ならfalse(デフォルトはfalse)
}
add_action('wp_enqueue_scripts', 'add_stylesheet');

// ナビメニューのliにclassを追加
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// jsの読み込み
function my_scripts()
{
  wp_enqueue_style('my-drawer-style', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css', array(), '3.2.2', false);
  wp_enqueue_script('my-scroll-js', 'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('my-drawer-js', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('custom_script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts');


// ナビゲーションメニュー設定
function my_menu_init()
{
  register_nav_menu('header-nav', 'ヘッダーナビゲーション');
  register_nav_menu('footer-nav', 'フッターナビゲーション');
}
add_action('init', 'my_menu_init');


// カスタム投稿タイプの追加
function create_post_type()
{
  register_post_type(
    'work',
    array(
      'labels' => array(
          'name' => 'works', 		//管理画面などで表示する名前
          'singular_name' => 'work' //管理画面などで表示する名前（単数形）
      ),
      'public' => true, 			//ユーザーが内容を投稿する場合true(通常はtrue)
        'menu_position' => 5,		//管理画面左側の表示位置(5:投稿, 10:メディア, 15:リンク, 20:固定ページ)
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
    )
  );
  flush_rewrite_rules( false );
}
add_action('init', 'create_post_type');


//アイキャッチ画像
add_theme_support( 'post-thumbnails' );


// 抜粋文字数制限
function my_the_excerpt($postContent){
  $postContent = mb_strimwidth($postContent, 0, 100, "...", "UTF-8");
  return $postContent;
}
add_filter('the_excerpt', 'my_the_excerpt');

//  本文テキスト文字数制限
function my_the_text($postContent){
  $postContent = mb_strimwidth($postContent, 0, 200, "...", "UTF-8");
  return $postContent;
}
add_filter('the_excerpt', 'my_the_excerpt');

// タイトル文字数制限
function my_the_title($postContent){
  $postContent = mb_strimwidth($postContent, 0, 30, "...", "UTF-8");
  return $postContent;
}
add_filter('the_title', 'my_the_title');

// noindexをつける
if ( !function_exists( 'is_noindex_page' ) ):
  function is_noindex_page(){
    return ( is_month()) ||  //月のアーカイブページはインデックスに含めない
    is_date() ||  //日のアーカイブはインデックスに含めない
    is_tag() ||  //タグページをインデックスしたい場合はこの行を削除
    is_search() ||  //検索結果ページはインデックスに含めない
    is_404() ||  //404ページはインデックスに含めない
    is_attachment();  //添付ファイルページも含めない
  }
  endif;


// <title></title>をページ種類に応じて自動出力 TODO:いずれここを<title>タグを全て置き換える
// add_theme_support( 'title-tag' );


// 抜粋を表示する
function original_description() {
  if(get_the_excerpt()) {
    $description = get_the_excerpt();
  }
  return $description;
}

// 現在のページ送り番号を表示(カテゴリーページを表示する際に必要)
function show_page_number() {
  global $wp_query;

  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $max_page = $wp_query->max_num_pages;
  echo $paged;  
}

// wpが自動で出力するcanonicalタグを止める
remove_action('wp_head', 'rel_canonical');