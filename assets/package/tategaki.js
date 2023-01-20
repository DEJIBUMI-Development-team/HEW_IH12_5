/* 縦書きプラグイン for jQuery 
2009.2 By KaZuhiro FuRuhata  */  
$.fn.tategaki = function(count){  
	if (!count) count = 25;  
	return this.each(function(){  
	var txt = $(this).text();  
	var result = `<table class="tategaki">`;  
	var line = Math.floor(txt.length / count);  
	for(var j=1; j<count+1; j++){ 
		result += '<tr>';  
		for(var i=line-1; i>=0; i--){  
				var c = txt.charAt(i*count+j);  
			switch(c){  
				case " " : c = '<br>'; break;  
				case "ー" : c = '｜'; break;  
			}
			result += '<td>' + c + '</td>';  
		}  
		result += '</tr>';  
	}  
	result += '</table>';  
	$(this).html(result);  
	});  
}  