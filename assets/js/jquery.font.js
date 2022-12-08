/// <reference path="../package/JQuery.d.ts" />

$(function(){
    //フォントサイズ変更
    $("[name='fontSize']").change(function(){
      var size = $(this).val();
      fitty('.fit', {
        minSize: 12,
        maxSize: 100,
      });
    $(".text").css("fontSize",size+"px");
    });
});

$(function(){
  //フォント変更
  $("[name='fontFamily']").change(function(){
    var font = $(this).val();

    $(".main-edit-content").css("width", "fit-content");
    // debugger;
    G_current_text = $(`#${G_current_focus}`).find(".text");
    G_current_text.css("fontFamily",font);

    fitty('.fit', {
      minSize: 12,
      maxSize: 100,
    });

    $(".main-edit-content").css("width", "fit-content");
    var resize_width =  document.querySelectorAll(".fit");
    var px_width = [];

    $(".main-edit-content").css("width", (index, _)=>{
      px_width[index] = resize_width[index].getBoundingClientRect();
      return `${px_width[index].width}px`;
    });
  
  });

});

$(function(){
  //テキスト縦横変更
  $("[name='writingMode']").change(function(){
    var WTorien = $(this).val();
    G_current_text = $(`#${G_current_focus}`).find(".text");
    G_current_width = $(`#${G_current_focus}`).css("height");
    G_current_height = $(`#${G_current_focus}`).css("width");
    
    $(`#${G_current_focus}`).css("width", G_current_width);
    $(`#${G_current_focus}`).css("height", G_current_height);
    
    G_current_text.css("writing-mode",WTorien);
    G_current_text.css("-webkit-writing-mode",WTorien);
    G_current_text.css("-ms-writing-mode", WTorien);

    G_writing_mode = G_current_text.css("writing-mode");

    fitty('.fit', {
      minSize: 12,
      maxSize: 100,
    });
  });
});