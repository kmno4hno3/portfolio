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