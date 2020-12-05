<?php
/**
 * cssディレクトリのstyle.cssの読み込み
 *
 * @return void
 */
function register_stylesheet()
{ // 読み込むCSSを登録する
  wp_register_style('style', get_template_directory_uri() . '/css/style.css');
}

/**
 * cssの読み込み順番を定義
 *
 * @return void
 */
function add_stylesheet()
{ // 登録したCSSを以下の順番で読み込む
  register_stylesheet();
  wp_enqueue_style('style', '', array(), '1.0', false); // ページの末尾で読み込ませるならtrue, head内ならfalse(デフォルトはfalse)
}
add_action('wp_enqueue_scripts', 'add_stylesheet');

/**
 * ナビメニューのliにclassを追加
 *
 * @param [type] $classes
 * @param [type] $item
 * @param [type] $args
 * @return void
 */
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * jsの読み込み
 *
 * @return void
 */
function my_scripts()
{
  wp_enqueue_style('my-drawer-style', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css', array(), '3.2.2', false);
  wp_enqueue_script('my-scroll-js', 'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('my-drawer-js', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('custom_script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts');

/**
 * ナビゲーションメニュー設定
 *
 * @return void
 */
function my_menu_init()
{
  register_nav_menu('header-nav', 'ヘッダーナビゲーション');
  register_nav_menu('footer-nav', 'フッターナビゲーション');
}
add_action('init', 'my_menu_init');


/**
 * カスタム投稿タイプの追加
 *
 * @return void
 */
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
/**
 * 抜粋文字数制限
 *
 * @param [type] $postContent
 * @return void
 */
function my_the_excerpt($postContent){
  $postContent = mb_strimwidth($postContent, 0, 100, "...", "UTF-8");
  return $postContent;
}
add_filter('the_excerpt', 'my_the_excerpt');

 /**
  * 本文テキスト文字数制限
  *
  * @param [type] $postContent
  * @return void
  */
function my_the_text($postContent){
  $postContent = mb_strimwidth($postContent, 0, 200, "...", "UTF-8");
  return $postContent;
}
add_filter('the_excerpt', 'my_the_excerpt');

/**
 * タイトル文字数制限
 *
 * @param [type] $postContent
 * @return void
 */
function my_the_title($postContent){

  // 個別投稿ページ、固定ページの場合
  if(is_singular()){
    $postContent = mb_strimwidth($postContent, 0, 100, "...", "UTF-8");
  }
  
  // トップページの場合
  if(is_front_page()){
    $postContent = mb_strimwidth($postContent, 0, 30, "...", "UTF-8");
  }
  
  return $postContent;
}
add_filter('the_title', 'my_the_title');


if ( !function_exists( 'is_noindex_page' ) ):
  /**
   * noindexをつける
   *
   * @return boolean
   */
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

/**
 * 抜粋を表示する
 *
 * @return void
 */
function original_description() {
  if(get_the_excerpt()) {
    $description = get_the_excerpt();
  }
  return $description;
}

/**
 * 現在のページ送り番号を表示(カテゴリーページを表示する際に必要)
 *
 * @return void
 */
function show_page_number() {
  global $wp_query;

  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $max_page = $wp_query->max_num_pages;
  echo $paged;  
}

// wpが自動で出力するcanonicalタグを止める
remove_action('wp_head', 'rel_canonical');


// 画像のディレクトリ指定
// function my_img_pass_short($arg) {
//   $content = str_replace('"images/', '"' . get_bloginfo('template_directory') . '/images/', $arg);
//   return $content;
//   }
//   add_action('the_content', 'my_img_pass_short');


/**
 * サイドバー表示
 *
 * @return void
 */
function my_widgets_init(){
  register_sidebar(
    array(
      'name' => 'Main Sidebar',
      'id' => 'main-sidebar',
      'before_widget'=>'<div id="%1$s" class="%2$s sidebar__wrapper">',
      'after_widget'=>'</div>',
      'before_title' => '<h3 class="sidebar__title">',
      'after_title' => '</h3>'
    )
  );
}
add_action('widgets_init', 'my_widgets_init');


/**
 * ページネーション出力関数
 *
 * @param [type] $pages 全ページ数
 * @param [type] $paged 現在のページ
 * @param integer $range 左右に何ページ表示するか
 * @param boolean $show_only 1ページしかない時に表示するかどうか
 * @return void
 */
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

  $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
  $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

  //表示テキスト
  $text_first   = "« 最初へ";
  $text_before  = "‹ 前へ";
  $text_next    = "次へ ›";
  $text_last    = "最後へ »";

  if ( $show_only && $pages === 1 ) {
      // １ページのみで表示設定が true の時
      echo '<div class="pagination"><span class="pagination__currentpager">1</span></div>';
      return;
  }

  if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

  if ( 1 !== $pages ) {
      //２ページ以上の時
      echo '<div class="pagination">';
      if ( $paged > $range + 1 ) {
          // 「最初へ」 の表示
          echo '<a href="', get_pagenum_link(1) ,'" class="pagination__first">', $text_first ,'</a>';
      }
      if ( $paged > 1 ) {
          // 「前へ」 の表示
          echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="pagination__prev">', $text_before ,'</a>';
      }
      for ( $i = 1; $i <= $pages; $i++ ) {

          if ( $i <= $paged + $range && $i >= $paged - $range ) {
              // $paged +- $range 以内であればページ番号を出力
              if ( $paged === $i ) {
                  echo '<span class="pagination__currentpager">', $i ,'</span>';
              } else {
                  echo '<a href="', get_pagenum_link( $i ) ,'" class="pagination__pager">', $i ,'</a>';
              }
          }

      }
      if ( $paged < $pages ) {
          // 「次へ」 の表示
          echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="pagination__next">', $text_next ,'</a>';
      }
      if ( $paged + $range < $pages ) {
          // 「最後へ」 の表示
          echo '<a href="', get_pagenum_link( $pages ) ,'" class="pagination__last">', $text_last ,'</a>';
      }
      echo '</div>';
  }
}