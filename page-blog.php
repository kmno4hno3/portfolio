<?php get_header(); ?>

<section class="sec sec--mt">
  <div class="inner">
    <div class="subheading">
      <h2 class="subheading__title">BLOG</h2>
      <p class="subheading__bar"></p>
    </div>
    <div class="container">
      <div class="col2 col2--blog">
        <div class="main">
          <div class="col1 col1--blog">
            <!-- TODO:パンくずリスト修正 -->
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
              <?php if(function_exists('bcn_display')){bcn_display();}?>
            </div>
            <?php
              get_template_part('loop-content');
            ?>
          </div>
        </div>
        <?php get_sidebar();?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>