<?php get_header(); ?>

<section class="sec sec--mt">
  <div class="inner">
    <div class="subheading">
      <h2 class="subheading__title">WORKS</h2>
      <p class="subheading__bar"></p>
    </div>
    <div class="container">
    <div class="col1">
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
      <div class="item" href="<?php echo get_permalink($post->ID)?>">
        <p class="item__tit"><?php echo my_the_title(get_the_title($post->ID)); ?></p>
        <?php
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'small');

          if(get_post_thumbnail_id($post->ID)){
            echo '<figure class=""><img src="' . $thumb_url[0] . '"></figure>';
          }

          $skill_field =  get_field('skill', $post->ID);
          echo '<p class="item__skill">' . $skill_field . '</p>'; // スキル

          $work_info_field =  get_field('work_info', $post->ID);
          echo '<p class="item__workinfo">' . $work_info_field . '</p>'; // work情報

          $site_url_field =  get_field('site_url', $post->ID);
          $repalced_url = preg_replace('#^https?://#', '', $site_url_field);
          echo '<a class="item__siteurl" href="' . $site_url_field . '">' . $repalced_url . '</a>'; // サイトURL



        ?>
      </div>
      <?php endforeach;?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>