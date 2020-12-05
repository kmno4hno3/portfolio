<?php get_header(); ?>

<main>

  <!-- sec -->
  <section class="sec--topbg">
    <div class="top">
      <!-- Todo:ここ消す -->
      <div class="top__inner">
        <!-- Todo:ここinnerのみに変更 -->
        <h1 class="top__title">Web Design</h1>
        <p class="top__text">ご要望通りの満足頂けるオリジナルのWEBサイト制作を承ります</p>
        <button class="btn"><a href="/contact">CONTACT</a></button>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec __spcol">
    <div class="inner">
      <div class="subheading">
        <h2 class="subheading__title">Introduction</h2>
        <p class="subheading__bar"></p>
      </div>
      <div class="container">
        <p class="container__text">ご訪問頂きありがとうございます。当サイトではお客様からのHP制作依頼を承ります。お客様からのご要望通りにすることはもちろんのこと、より満足頂けるようお客様の意見をくまなく汲みとってサイト設計を行います。また、SEO対策を実施して集客効果を高める対応も致しますので、デザインだけでなく有用性が高いサイトに仕上げます。HPをゼロから作りたい、既存のHPに機能を追加したいなどあらゆるWEB制作のニーズにお応えします。HP制作後もお客様の方で記事を更新したりできるよう、CMSにてHPを構築致します。どのようなご相談でも伺いますので、まずはお気軽にご相談下さい。
        </p>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec">
    <div class="inner">
      <div class="subheading">
        <h2 class="subheading__title">SERVICE</h2>
        <p class="subheading__bar"></p>
      </div>
      <div class="container">
        <div class="col3">
          <div class="colItem">
            <img src="<?php echo get_template_directory_uri(); ?>/img/icon-pen.png" alt="" class="colItem__img">
            <p class="colItem__tit">企画</p>
            <p class="colItem__text">ご要望を丁寧にヒアリングします。求めるものをしっかり聞き取り、お客様のご要望や目的に合わせて最もベストなプランを企画します。必ず気に入って下さるように入念に準備をしてwebサイトやバナー制作がより良いものになるように致します。</p>
          </div>
          <div class="colItem">
            <img src="<?php echo get_template_directory_uri(); ?>/img/icon-palette.png" alt="" class="colItem__img">
            <p class="colItem__tit">デザイン</p>
            <p class="colItem__text">お客様からヒアリングして練ったプランを基にデザインして行きます。目的に合わせて見た目と機能性が両立するデザインを心掛け、世界で一つだけのオリジナリティあるwebサイトを作成します。</p>
          </div>
          <div class="colItem">
            <img src="<?php echo get_template_directory_uri(); ?>/img/icon-code.png" alt="" class="colItem__img">
            <p class="colItem__tit">コーディング</p>
            <p class="colItem__text">デザインを基にアニメーションや使いやすさを追求し、これらをコーディングにより実現します。見た目だけでなくサイトを訪れた人が利用しやすいよう作り込み、集客効果を高めます。</p>
          </div>
        </div>
        <div class="detail">
          <p class="detail__txt">
            <a href="/service" class="detail__link">サービスの詳細
              <i class="detail__icon fa fa-chevron-right"></i>
            </a>
          </p>
        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec">
    <div class="inner">
      <div class="subheading">
        <h2 class="subheading__title">WORKS</h2>
        <p class="subheading__bar"></p>
      </div>
      <div class="container">
        <div class="cards">
          <?php
          $args = array(
            'posts_per_page' => 3,
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
              <p class="cardItem__tit"><?php echo my_the_title(get_the_title($post->ID)); ?></p>
              <p class="cardItem__excerpt"><?php echo my_the_excerpt(get_the_excerpt($post->ID)); ?></p>
            </a>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <div class="detail">
          <p class="detail__txt">
            <a href="/works" class="detail__link">制作物一覧
              <i class="detail__icon fa fa-chevron-right"></i>
            </a>
          </p>
        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <section class="sec">
    <div class="inner">
      <div class="subheading">
        <h2 class="subheading__title">BLOG</h2>
        <p class="subheading__bar"></p>
      </div>
      <div class="container">
        <div class="cards">
          <?php
          $args = array(
            'posts_per_page' => 3,
            'post_type' => array('post'),
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
              <p class="cardItem__tit"><?php echo my_the_title(get_the_title($post->ID)); ?></p>
              <div class="time">
                <p class="time__item"><i class="time__icon fa fa-sync-alt"></i><?php echo get_the_time('Y-m-d'); ?></p>
                <p class="time__item"><i class="time__icon fas fa-calendar-alt"></i><?php echo get_the_modified_time('Y-m-d'); ?></p>
              </div>
              <p class="cardItem__text"><?php echo my_the_text(get_the_excerpt($post->ID)); ?></p>
            </a>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <div class="detail">
          <p class="detail__txt">
            <a href="/blog" class="detail__link">ブログ一覧
              <i class="detail__icon fa fa-chevron-right"></i>
            </a>
          </p>
        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <section class="sec">
    <div class="inner">
      <div class="subheading">
        <h2 class="subheading__title">ABOUT</h2>
        <p class="subheading__bar"></p>
      </div>
      <div class="container">
        <div class="overlap">
          <div class="overlap__item">
            <img src="<?php echo get_template_directory_uri(); ?>/img/img-prof.png" alt="" class="overlap__img overlap__img--col2">
          </div>
          <div class="overlap__item">
            <p class="overlap__text"><span class="overlap__enhansis">名前 : </span>遠藤達也</p>
            <p class="overlap__text"><span class="overlap__enhansis">職業: </span>ITエンジニア</p>
            <p class="overlap__text"><span class="overlap__enhansis">事業内容 : </span>ウェブ制作</p>
            <p class="overlap__text"><span class="overlap__enhansis">住所 : </span>神奈川県川崎市</p>
          </div>
        </div>
        <div class="detail">
          <p class="detail__txt">
            <a href="/about" class="detail__link">プロフィール詳細
              <i class="detail__icon fa fa-chevron-right"></i>
            </a>
          </p>
        </div>
      </div>
    </div>
  </section><!-- /sec -->

  <!-- sec -->
  <section class="sec">
    <div class="inner">
      <div class="subheading">
        <h2 class="subheading__title">CONTACT</h2>
        <p class="subheading__bar"></p>
      </div>
      <div class="container container--contact">
        <div class="contact">
          <p class="contact__txt">お気軽に下記応募フォームからお問い合わせ下さい</p>
          <button class="btn btn--contact"><a href="/contact">CONTACT</a></button>
          <p class="contact__txt">翌営業日までには返信致します。</p>
        </div>
      </div>
    </div>
  </section><!-- /sec -->

</main>


<?php get_footer(); ?>