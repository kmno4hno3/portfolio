<?php get_header(); ?>

<section class="sec sec--mt">
  <div class="inner">
    <div class="subheading">
      <h2 class="subheading__title">WORKS</h2>
      <p class="subheading__bar"></p>
    </div>
    <div class="container">
      <?php
        $args = array(
          'posts_per_page',
          'post_type' => array('work'),
          'orderby' =>'date',
          'order' => 'DESC'
        );
        $my_posts = get_posts($args);
      ?>
      <?php foreach($my_posts as $post): setup_postdata($post);?>
      <a href="<?php echo get_permalink($post->ID)?>">
        <?php
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'small');

          if(get_post_thumbnail_id($post->ID)){
            echo '<figure><img src="' . $thumb_url[0] . '"></figure>';
          }
        ?>
      </a>
      <?php endforeach;?>
    </div>
  </div>
</section>

<?php get_footer(); ?>