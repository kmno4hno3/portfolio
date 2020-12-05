<?php get_header(); ?>

<section class="sec sec--mt">
  <div class="inner">
    <div class="container">
      <div class="col2 col2--blog">
        <div class="main">
          <div class="col1 col1--blog">
            <?php if(have_posts()): while(have_posts()):the_post(); ?>
            <div class="blog">
              <?php get_template_part('template-parts/breadcrumb');?>
              <h1>
                <p class="blog__tit"><?php the_title(); ?></p>
              </h1>
              
              <div class="time">
              <p class="time__item"><i class="time__icon fas fa-calendar-alt"></i><?php echo get_the_time('Y-m-d'); ?></p>
              <p class="time__item"><i class="time__icon fa fa-sync-alt"></i><?php echo get_the_modified_time('Y-m-d');?></p>
              </div>
              <p>
              <figure class="blog__img"><?php the_post_thumbnail();?></figure>
              </p>
              <div class="blog__text"><?php the_content(); ?></div>
            </div>
            <?php endwhile; endif; ?>
          </div>
        </div>
        <?php get_sidebar();?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>