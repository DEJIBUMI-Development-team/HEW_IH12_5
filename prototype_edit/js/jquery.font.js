$(function(){
    //フォントサイズ変更
    $("[name='fontSize']").change(function(){
      var size = $(this).val();
    $("p").css("fontSize",size+"px");
    })
  });

$(function(){
  //フォント変更
  $("[name='fontFamily']").change(function(){
    var font = $(this).val();
  $("p").css("fontFamily",font);
  })
});

$(function(){
  //テキスト縦横変更
  $("[name='writingMode']").change(function(){
    var WTorien = $(this).val();
  $("p").css("writing-mode",WTorien);
  })
});