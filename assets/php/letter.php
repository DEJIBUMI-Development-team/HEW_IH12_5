<?php
include("db.php");

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$elem = db("SELECT * FROM t_user_letter where letter_id = {$id}");
	$img_data = base64_encode($elem[0]["raw_data"]);
} else {
	print("NOT EXIST IMG ELEMENT");
}

if (!empty($_GET["title"])) {
	$title = $_GET["title"];
	foreach ($_GET["survey"] as $key => $value) {
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head prefix="og: http://ogp.me/ns#">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/letter.css">
	<meta property="og:title" content="でじぶみ">
	<meta property="og:description" content="あなたにお手紙が届いています">
	<meta property="og:image" content="../../img/logo.png">
	<title>Document</title>
</head>

<body>
	<div class="img_elem">
		<img src="data:image/png;base64,<?php echo $img_data; ?>">
	</div>
	<?php
	if (!empty($_GET["title"])) {
		$title = $_GET["title"];
		echo <<<EOD
			<form action="" method="post" class="survey-form">
				<div class="survey-contents">
					<div class="survey-title"><h3>{$title}</h3></div>
					<div class="respondent">
						<label for="respondent-title"><h4>お名前</h4></label>
						<input type="text" id="respondent-title" name="respondent-name">
					</div>		
			EOD;

		foreach ($_GET["survey"] as $key => $value) {
			echo <<<EOD
					<div class="survey">
						<input type="radio" name="survey" value="{$value}" id="survey{$key}">
						<label for="survey{$key}" class="input-label"><div class="input-content"><h4>{$value}</h4></div></label>
					</div>
					
				
				EOD;
		}
		echo <<<EOD
				<div class="survey-submit">
					<input type="submit" name="submit" value="アンケートを送信する" id="submit">				
				</div>
				</div>
			</form>
			EOD;
	}
	?>
</body>

</html>