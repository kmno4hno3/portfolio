<aside class="sidebar">
  <?php if( is_active_sidebar('main-sidebar')):?>
  <ul class="sidebar__menu">
    <?php dynamic_sidebar('main-sidebar');?>
  </ul>
  <?php endif;?>
</aside>