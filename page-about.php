<?php get_header(); ?>

<section class="sec sec--mt">
  <div class="inner">
    <div class="subheading">
      <h2 class="subheading__title">ABOUT</h2>
      <p class="subheading__bar"></p>
    </div>
    <div class="container">
      <div class="col1">
        <img class="col1__img" src="<?php echo get_template_directory_uri(); ?>/img/img-prof.png" alt="">
        <ul class="col1__lists">
          <li>&lt;略歴&gt;</li>
          <li>2017年東京農工大学大学院修了</li>
          <li>2020年ITエンジニアに転職/ウェブアプリの開発業務に従事</li>
        </ul>
        <table class="table">
          <tr class="table__line">
            <td class="">名前 : </td>
            <td>遠藤達也</td>
          </tr>
          <tr class="table__line">
            <td>職業: </td>
            <td>ITエンジニア</td>
          </tr>
          <tr class="table__line">
            <td>事業内容 : </td>
            <td>ウェブ制作</td>
          </tr>
          <tr class="table__line">
            <td>住所 : </td>
            <td>神奈川県川崎市</td>
          </tr>
        </table>
        <div class="col1__icons">
          <a class="" href="https://github.com/kmno4hno3"><i class="fab fa-github fa-2x col1__icon"></i></a>
          <a class="" href="https://twitter.com/engineertatsuya"><i class="fab fa-twitter fa-2x col1__icon"></i></a>
        </div>
        <div class="col1__other">
          <p class="col1__text">下の記事は私がITエンジニアになる前に卒業した<br>プログラミングスクールの「コードキャンプ」にて<br>掲載して頂いた記事になります。</p>
          <a class="col1__link" href="https://blog.codecamp.jp/endo_interview_codecamp">掲載記事</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>