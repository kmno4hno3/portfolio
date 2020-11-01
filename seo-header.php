<?php
// <!--functionsに記載している定義にnoindexをつける-->
if (is_noindex_page()) : ?>
<meta name="robots" content="noindex,follow">
<?php endif; ?>

<!--（１）トップページ-->
<?php if (is_home() || is_front_page()) : ?>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>" />

<!--（２）single.php-->
<?php elseif (is_single()) : ?>
<?php if (get_field("originalTitle")) : ?>
<title><?php echo the_field('originalTitle'); ?></title>
<?php else : ?>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php endif; ?>
<?php if (get_field("originalDescription")) : ?>
<meta name="description" content="<?php echo the_field('originalDescription'); ?>" />
<?php $customfield = get_post_meta($post->ID, 'originalDescription', true); ?>
<?php elseif (empty($customfield) && has_excerpt($post->ID)) : ?>
<meta name="description" content="<?php echo original_description(); ?>">
<?php else : ?>
<meta name="description" content="<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<?php
                                          $des = get_the_content();
                                          $des = strip_tags($des);
                                          $des = str_replace(' ', " ", $des); //改行を除去
                                          $des = str_replace(array("\r\n", "\r", "\n"), '', $des); //余計な文字列を除去
                                          $desp = mb_substr($des, 0, 120, "UTF-8");
                                          echo $desp;
    ?>
		<?php endwhile; ?>
	<?php endif; ?>" />
<?php endif; ?>

<!--（３）category.php-->
<?php elseif (is_category()) : ?>
<?php if (!is_paged()) : ?>
<?php
    $cat_id = get_queried_object()->cat_ID;
    $post_id = 'category_' . $cat_id;
    ?>
<title><?php single_cat_title('', true); ?> | <?php bloginfo('name'); ?></title>
<meta name="description" content="<?php
                                      $cat_id = get_queried_object()->cat_ID;
                                      $post_id = 'category_' . $cat_id;
                                      $text = category_description();
                                      $text = strip_tags($text);
                                      $text = mb_substr($text, 0, 120, "UTF-8");
                                      echo $text;
                                      ?>" />
<?php else : ?>
<title><?php show_page_number(''); ?>ページ目 <?php single_cat_title('', true); ?> | <?php bloginfo('name'); ?></title>
<?php endif; ?>

<!--（４）固定ページ-->
<?php elseif (is_page()) : ?>
<?php if (get_field("originalTitle")) : ?>
<title><?php echo the_field('originalTitle'); ?></title>
<?php else : ?>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php endif; ?>
<?php if (get_field("originalDescription")) : ?>
<meta name="description" content="<?php echo the_field('originalDescription'); ?>" />
<?php else : ?>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php endif; ?>

<!--（５）検索結果ページ-->
<?php elseif (is_search()) : ?>
<title>検索結果 | <?php bloginfo('name'); ?></title>

<!--（６）404ページ-->
<?php elseif (is_404()) : ?>
<title>お探しのページはございません | <?php bloginfo('name'); ?></title>

<!--（７）その他-->
<?php else : ?>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php endif; ?>

<?php
// <!--canonicalタグの設定-->
// <!--// 404ページと検索ページでなければ表示-->
if (!is_404() && !is_search()) {
  echo '<link rel="canonical" href="https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '">';
} ?>