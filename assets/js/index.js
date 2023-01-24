/* ------------------------------------------------
first_view
--------------------------------------------------- */
// 読み込み時に一番上表示
$(window).on('beforeunload', function(e){
  /** 更新される直前の処理 */
  scrollTo(0, 0);
  console.log('beforeunload');
});

// 右下固定説明動画固定ウィンドウ

window.addEventListener("scroll", function () {
  const elm = document.querySelector(".elm");
  const scroll = window.pageYOffset;
  if (scroll > 70) {
    elm.style.opacity = "1";
    // console.log(scroll);
  } else {
    elm.style.opacity = "0";
    // console.log(scroll);
  }
});

// window.addEventListener("scroll", function () {
//   const topBtn = document.getElementById("topbutton");
//   const scroll = window.pageYOffset;
//   if (scroll > 5) {      // ➃
//     topBtn.style.opacity = 1;
//   } else topBtn.style.opacity = 0; 
// });

//モーダル表示
$(".video-open").modaal({
  // start_open:true, // ページロード時に表示するか
  // overlay_close:true,//モーダル背景クリック時に閉じるか
  type: 'video',
  background: '#28BFE7', // 背景色
  overlay_opacity:0.8, // 透過具合
  // before_open:function(){// モーダルが開く前に行う動作
  //   $('html').css('overflow-y','hidden');/*縦スクロールバーを出さない*/
  // },
  // after_close:function(){// モーダルが閉じた後に行う動作
  //   $('html').css('overflow-y','scroll');/*縦スクロールバーを出す*/
  // }
  });

/* ------------------------------------------------
first_content
--------------------------------------------------- */
// スライダー

var pics_src = new Array("./assets/img/Explanation-01.png","./assets/img/Explanation-02.png","./assets/img/Explanation-03.png");
    var num = 0;

    function go_forward(){
        if (num == 2) {
            num = 0;
        }
        else {
            num ++;
        }
        document.getElementById("mypic").src=pics_src[num];
    }

    function go_back(){
        if (num == 0) {
            num = 2;
        }
        else {
            num --;
        }
        document.getElementById("mypic").src=pics_src[num];
    }

//モーダル表示
// $(".video-open").modaal({
//   overlay_close:true,//モーダル背景クリック時に閉じるか
//   type: 'video',
//   background: '#FFEDB3', // 背景色
//   overlay_opacity:0.4, // 透過具合
//   before_open:function(){// モーダルが開く前に行う動作
//     $('html').css('overflow-y','hidden');/*縦スクロールバーを出さない*/
//   },
//   after_close:function(){// モーダルが閉じた後に行う動作
//     $('html').css('overflow-y','scroll');/*縦スクロールバーを出す*/
//   }
//   });

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

const header_element = document.querySelector(".navigator");
const hover_icon = document.querySelector(".icon");
const hover_text = document.querySelector(".hover_text");

let scroll_offset = 0;

window.addEventListener("scroll",()=>{
  debugger;
  scroll_offset = window.pageYOffset;
  if (scroll_offset > 0) {
    header_element.classList.remove("scroll_tgl");
    hover_icon.classList.remove("icon_top");
    hover_text.classList.add("hover_tgl");
  }else {
    hover_icon.classList.add("icon_top");
    hover_text.classList.remove("hover_tgl");
    header_element.classList.add("scroll_tgl");
  }
});
window.addEventListener("load", () => {
  setTimeout(()=>{
    hover_icon.classList.add("icon_top");    
    hover_text.classList.remove("hover_tgl");
  }, 3500);
});