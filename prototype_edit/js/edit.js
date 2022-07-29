// $(".move3").draggable({containment: "#w3"});
$(".move3").on("click",(e)=>{
    debugger;
    e.stopPropagation();
    $(".move3").draggable("destroy");
    $(".move3").addClass("boder");
});

$(".wrap").on("click",()=>{
    $(".move3").draggable({containment: "#w3"});
    $(".move3").removeClass("boder");
});

$(".move3").hover(()=>{
    $(".move3").addClass("boder");
},()=>{
    $(".move3").removeClass("boder");
});

// $(".move4").dblclick((e)=>{
//     debugger;
//     e.stopPropagation();
//     $(".move3").draggable("destroy");
//     $(".move3").addClass("boder");
// });
//// 現状不要処理(いったん残しとく)
// $("#posi").bind("mousemove", function(){
// 	var left = $("#posi").css("left")
//     var top = $('#posi').css("top");
// 	debugger;
//     $('#left').val(left);
//     $('#top').val(top);
// });
