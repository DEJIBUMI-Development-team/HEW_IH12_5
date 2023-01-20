/* ------------------------------------------------
first_view
--------------------------------------------------- */
// 読み込み時に一番上表示
$(window).on('beforeunload', function(e){
  /** 更新される直前の処理 */
  scrollTo(0, 0);
  console.log('beforeunload');
});

    // function scrollToTop() {
    //   scrollTo(0, 0);
    //  }
/* ------------------------------------------------
first_content
--------------------------------------------------- */
//モーダル表示
$(".video-open").modaal({
  overlay_close:true,//モーダル背景クリック時に閉じるか
  type: 'video',
  background: '#FFEDB3', // 背景色
  overlay_opacity:0.4, // 透過具合
  before_open:function(){// モーダルが開く前に行う動作
    $('html').css('overflow-y','hidden');/*縦スクロールバーを出さない*/
  },
  after_close:function(){// モーダルが閉じた後に行う動作
    $('html').css('overflow-y','scroll');/*縦スクロールバーを出す*/
  }
  });

/* ------------------------------------------------
second_content
--------------------------------------------------- */

// 1. 動くきっかけを独自の名前（関数：fadeAnime）で定義

function fadeAnime(){

  //動きの指定
    $('.fadeInTrigger').each(function(){ //fadeInTriggerというクラス名が
      var elemPos = $(this).offset().top-50;//要素より、50px上の
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight){
      $(this).addClass('In');// 画面内に入ったらfadeInというクラス名を追記
      }else{
      $(this).removeClass('In');// 画面外に出たらfadeInというクラス名を外す
      }
      });
  
  }
  
  // 2. 定義した名前をページが読み込まれた後・スクロールした後それぞれのきっかけに指定
  
  // 画面をスクロールをしたら動く場合の記述
    $(window).scroll(function (){
  
      fadeAnime();/* アニメーション用の関数を呼ぶ*/
  
    });// ここまで画面をスクロールをしたら動く場合の記述
  
  // 画面が読み込まれたらすぐに動く場合の記述
    $(window).on('load', function(){
  
      fadeAnime();/* アニメーション用の関数を呼ぶ*/
  
    });// ここまで画面が読み込まれたらすぐに動く場合の記述

/* ------------------------------------------------
third_content
--------------------------------------------------- */
$(document).ready(function() {
  $('.slider').slick({
    centerMode: true,
    centerPadding: '5%',
    dots: true,
    autoplay: true,
    autoplaySpeed: 1500,
    speed: 1500,
    focusOnSelect: true,
    infinite: true,
    touchMove: true
  });
});
