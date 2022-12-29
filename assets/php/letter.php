<?php
	include("db.php");

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$elem = db("SELECT * FROM t_user_letter where letter_id = {$id}");
	$img_data = base64_encode($elem[0]["raw_data"]);
}else {
	print("NOT EXIST IMG ELEMENT");		
}
?>
<!DOCTYPE html>
<html lang="en">
<head prefix="og: http://ogp.me/ns#">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/letter.css">
	<meta property="og:title" content="でじぶみ">
	<meta property="og:description" content="あなたにお手紙が届いています">	
	<meta property="og:image" content="../../img/logo.png">
	<title>Document</title>
</head>
<body>
	<div class="img_elem">
		<img src="data:image/png;base64,<?php echo $img_data; ?>">
	</div>
</body>
</html>