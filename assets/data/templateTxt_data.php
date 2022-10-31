<?php

$flag = false;

if ($flag) {
	$templateTxt = "DB引き渡しテキスト";
}else {	
	$templateTxt = "テキストを入力してください";
}

$html = <<<EOD
<div class="ft_content">
	<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
	<foreignObject width="100%" height="100%" x="0" y="0">
		<div xmlns="http://www.w3.org/1999/xhtml" contenteditable="true" class="text">
			<text>{$templateTxt}</text>
		</div>
	</foreignObject>
	</svg>                  
</div>
EOD;

$temp_object = [
	"ft_content" => [
		"dom" => $html
	]
];
