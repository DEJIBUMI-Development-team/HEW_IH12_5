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