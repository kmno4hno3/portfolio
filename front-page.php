<?php get_header(); ?>

<main>

  <!-- sec -->
  <section class="sec--topbg">
    <div class="top">
      <div class="top__inner">
        <h1 class="top__title">Web Design</h1>
        <p class="top__text">ご要望通りの満足頂けるオリジナルのWEBサイト制作を承ります</p>
        <button class="btn"><a href="#">CONTACT</a></button>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec">
    <div class="introduction">
      <div class="introduction__inner">
        <div class="subheading">
          <h2 class="subheading__title">Introduction</h2>
          <p class="subheading__bar"></p>
        </div>
        <div class="container">
          <p class="container__text">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト
          </p>
        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec">
    <div class="service">
      <div class="service__inner">
        <div class="subheading">
          <h2 class="subheading__title">SERVICE</h2>
          <p class="subheading__bar"></p>
        </div>
        <div class="container">
          <div class="col3">
            <div class="colItem">
              <img src="<?php echo get_template_directory_uri(); ?>/img/icon-pen.png" alt="">
              <p class="colItem__tit">企画</p>
              <p class="colItem__text">ご要望を丁寧にヒアリングします。求めるものをしっかり聞き取り、お客様のご要望や目的に合わせて最もベストなプランを企画します。必ず気に入って下さるように入念に準備をしてwebサイトやバナー制作がより良いものになるように致します。</p>
            </div>
            <div class="colItem">
              <img src="<?php echo get_template_directory_uri(); ?>/img/icon-palette.png" alt="">
              <p class="colItem__tit">デザイン</p>
              <p class="colItem__text">お客様からヒアリングして練ったプランを基にデザインして行きます。目的に合わせて見た目と機能性が両立するデザインを心掛け、世界で一つだけのオリジナリティあるwebサイトを作成します。</p>
            </div>
            <div class="colItem">
              <img src="<?php echo get_template_directory_uri(); ?>/img/icon-code.png" alt="">
              <p class="colItem__tit">コーディング</p>
              <p class="colItem__text">デザインを基にアニメーションや使いやすさを追求し、これらをコーディングにより実現します。見た目だけでなくサイトを訪れた人が利用しやすいよう作り込み、集客効果を高めます。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec">
    <div class="service">
      <div class="service__inner">
        <div class="subheading">
          <h2 class="subheading__title">WORKS</h2>
          <p class="subheading__bar"></p>
        </div>
        <div class="container--cards">
          <div class="cards">
            <?php
            $args = array(
              'post_per_page' => 5,
              'post_type' => array('work'),
              'orderby' => 'date',
              'order' => 'DESC'
            );
            $my_posts = get_posts($args);
            ?>
            <?php foreach ($my_posts as $post) : setup_postdata($post); ?>
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
                <p class="cardItem__tit"><?php echo get_the_title($post->ID); ?></p>
                <p class="cardItem__excerpt"><?php echo get_the_excerpt($post->ID); ?></p>
              </a>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <section class="sec">
    <div class="service">
      <div class="service__inner">
        <div class="subheading">
          <h2 class="subheading__title">BLOG</h2>
          <p class="subheading__bar"></p>
        </div>
        <div class="container">

        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <section class="sec">
    <div class="service">
      <div class="service__inner">
        <div class="subheading">
          <h2 class="subheading__title">ABOUT</h2>
          <p class="subheading__bar"></p>
        </div>
        <div class="container">

        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec">
    <div class="introduction">
      <div class="introduction__inner">
        <div class="subheading">
          <h2 class="subheading__title">CONTACT</h2>
          <p class="subheading__bar"></p>
        </div>
        <div class="container">

        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec">

  </section><!-- /sec -->


</main>


<?php get_footer(); ?>