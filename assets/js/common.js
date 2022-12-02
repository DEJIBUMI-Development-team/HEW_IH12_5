/*
 *
 * File Name : common.js [use jquery]
 *
 */



$(window).load(function(){
  scrolltop();
  pulldown();
  $('.target').delay(500).scrollClass();
  //cal();
});


/*********************************************************************************************/
// Journal のプルダウン
/*********************************************************************************************/
function pulldown(){
  $('#button').click(function() {
      if ($(this).hasClass('selected')) {
          $(this).removeClass('selected');
          $('#pull_down ul').slideUp('fast');
          $('#pull_down img').attr('src', '/material/images/journal/arr_vertical.gif');
      } else {
          $(this).addClass('selected');
          $('#pull_down ul').slideDown('fast');
          $('#pull_down img').attr('src', '/material/images/journal/arr_vertical_selected.gif');
      }
  });
}
/*********************************************************************************************/



/*********************************************************************************************/
// トップへスクロール
/*********************************************************************************************/
function scrolltop(){
  var pageTop = $("#gototop");
  pageTop.click(function () {
      $('body, html').animate({ scrollTop: 0 }, 500);
      return false;
  });

  pageTop.hover(function(){
      $(this).animate({ marginBottom: "5px" }, 100);
      return false;
  }, function(){
      $(this).animate({ marginBottom: "0px" }, 100);
      return false;
  });
}
/*********************************************************************************************/


/*********************************************************************************************/
// スロールに合わせてclass追加
/*********************************************************************************************/
(function($){
  $.fn.scrollClass = function(config){
      var defaults = {};
      var config = $.extend(defaults, config);
      var target = this;

      function addAction(){
          var length = target.length;
          for(var i=0; i<length; i++){
              if(target.eq(i).hasClass('action')) continue;
              
              var in_position = target.eq(i).offset().top + 100;
              var window_bottom_position = $(window).scrollTop() + $(window).height();
              if(in_position < window_bottom_position){
                  target.eq(i).addClass('action');
              }
          }
      }
      addAction();

      $(window).on('scroll', $.throttle(250, function(){
          addAction();
      }));
      return target;
  };
} )(jQuery);
/*********************************************************************************************/