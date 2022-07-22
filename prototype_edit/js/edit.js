$(".move3").draggable({ containment: "#w3"});
$(".move3").resizable({});
$("#posi").bind("mousemove", function(){
	var left = $("#posi").css("left")
    var top = $('#posi').css("top");
	// debugger;
    $('#left').val(left);
    $('#top').val(top);
});