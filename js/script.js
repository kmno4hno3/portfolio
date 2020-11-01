// ハンバーガーメニュー
jQuery(document).ready(function() {
  jQuery('.drawer').drawer();
});

// スクロール位置でヘッダーの背景色変化(途中)
var topY = jQuery(window).scrollTop();
if(topY > 100){
  jQuery('.header').addClass('header--scrolled').css('background-color', 'white');
} else {
  jQuery('.header').removeClass('header--scrolled');
}
jQuery(window).scroll(function(){
  var topY = jQuery(window).scrollTop();
  if(topY > 100){
    jQuery('.header').addClass('header--scrolled').css('transition', '1s');
  } else {
    jQuery('.header').removeClass('header--scrolled');
  }
})