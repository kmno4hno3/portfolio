<?php
  if(get_query_var('paged')){
    $paged=get_query_var('paged');
  }else {
    $paged=1;
  }

  $args = array(
  'paged' => $paged,
  'post_status' => 'publish',
  'posts_per_page' => 5,
  'post_type' => array('post'),
  'orderby' => 'date',
  'order' => 'DESC',
  );

  // カテゴリーページの場合
  if(is_category()){
    $cat = get_the_category();
    $cat = $cat[0];
    $cat_id = $cat->cat_ID;
    $args['cat'] = $cat_id;
  }

  $the_query = new WP_query($args);
?>
<?php 
  if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<a class="cardItem" href="<?php echo get_permalink($post->ID); ?>">
  <?php
  $thumbnail_id = get_post_thumbnail_id($post->ID);
  $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'small');
  if (get_post_thumbnail_id($post->ID)) {
    echo '<figure class="cardItem__fig"><img src="' . $thumb_url[0] . '" alt=""></figure>';
  } else {
    echo '<figure class="cardItem__fig"><img src="' . get_template_directory_uri() . '/img/no-img.png" alt=""></figure>';
  }
?>
  <p class="cardItem__tit"><?php echo my_the_title(get_the_title($post->ID)); ?></p>
  <div class="time">
    <p class="time__item"><i class="time__icon fas fa-calendar-alt"></i><?php echo get_the_time('Y-m-d'); ?></p>
    <p class="time__item"><i class="time__icon fa fa-sync-alt"></i><?php echo get_the_modified_time('Y-m-d');?>
    </p>
  </div>
  <p class="cardItem__text cardItem__text--blog"><?php echo my_the_text(get_the_excerpt($post->ID)); ?></p>
</a>
<?php
endwhile;
    endif;
?>
<!-- ページャー -->
<?php
    if ( function_exists( 'pagination' ) ) :
      pagination( $the_query->max_num_pages, get_query_var( 'paged' ) );
    endif;
?>
<!-- / ページャー -->
<?php wp_reset_query(); ?>