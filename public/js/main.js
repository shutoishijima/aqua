jQuery(function() {
  //モーダル
  jQuery('.js-modal-open').on('click',function(){
      jQuery('.modal').fadeIn();
      return false;
  });
  jQuery('.js-modal-close').on('click',function(){
      jQuery('.modal').fadeOut();
      return false;
  });
  //モーダル2
  jQuery('.modal-nav-open').on('click',function(){
    jQuery('.modal-nav').fadeIn();
    return false;
  });
  jQuery('.modal-nav-close').on('click',function(){
      jQuery('.modal-nav').fadeOut();
      return false;
  });
  //モーダル3
  jQuery('.modal-search-open').on('click',function(){
    jQuery('.modal-search').fadeIn();
    return false;
  });
  jQuery('.modal-search-close').on('click',function(){
      jQuery('.modal-search').fadeOut();
      return false;
  });

  //selectタグの擬似placeholder
  jQuery('select').on('change', function(){
    if(jQuery(this).val() == ""){
      jQuery(this).css('color','rgb(131, 131, 131)')
    } else {
      jQuery(this).css('color','rgb(0, 0, 0)')
    }
  });

  //マイページのプロフィール上下ver(表示・非表示切り替え)
  jQuery('.switch-button').nextAll().hide();
  jQuery('.switch-button').click(function () {
    if (jQuery(this).nextAll().is(':hidden')) {
      jQuery(this).nextAll().slideDown();
      jQuery(this).html('プロフィールを閉じる<i class="fas fa-times"></i>').addClass('switch-button-close');
    } else {
      jQuery(this).nextAll().slideUp();
      jQuery(this).html('プロフィールを確認<i class="fas fa-plus"></i>').removeClass('switch-button-close');
    }
  });
  //マイページのプロフィール下上ver(表示・非表示切り替え)
  jQuery('.switch-button2').prevAll().hide();
  jQuery('.switch-button2').click(function () {
    if (jQuery(this).prevAll().is(':hidden')) {
        jQuery(this).prevAll().slideDown();
        jQuery(this).text('一部を隠す').addClass('switch-button2-close');
    } else {
        jQuery(this).prevAll().slideUp();
        jQuery(this).text('全てを表示').removeClass('switch-button2-close');
    }
  });

  //スライダー
  jQuery('.slider').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 600,
    dots: true,
    dotsClass: "slide-dots",
    swipeToSlide: true,
    infinite: true,
    cssEase: 'linear',
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: false,
  });

  //スムーススクロール
  jQuery('a[href^="#"]').click(function(){
    let speed = 500;
    let href= $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top;
    jQuery("html, body").animate({scrollTop: position - 150}, speed, "swing");
    return false;
  });
});

//ハンバーガー
jQuery(document).ready(function() {
  function toggleSidebar() {
    jQuery(".hamburger-button").toggleClass("active");
    jQuery(".main").toggleClass("move-to-left");
    jQuery(".hamburger-item").toggleClass("active");
  }

  jQuery(".hamburger-button").on("click tap", function() {
    toggleSidebar();
  });
});