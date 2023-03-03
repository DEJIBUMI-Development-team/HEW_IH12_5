<?php
include("db.php");

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$elem = db("SELECT * FROM t_user_letter where letter_id = {$id}");
	$img_data = base64_encode($elem[0]["raw_data"]);
	$survey_check = json_decode($elem[0]["survey"], true);
	$is_survey = (isset($survey_check["ending"])) ? $survey_check["ending"] : true ;
} else {
	print("NOT EXIST IMG ELEMENT");
}

$file = "../data/gift_data/gift.json";
$json_file = file_get_contents($file);
$gift_data = json_decode($json_file, true);

if (!empty($_POST["submit"])) {
	$survey_result = $_POST["survey"];
	$post_name = $_POST["respondent-name"];
	$survey_data = json_decode($elem[0]["survey"], true);
	foreach ($survey_data as $key => $value) {
		if ($key == "title")
			continue;
		if ($value["survey_select"] == $survey_result) {
			$survey_data[$key]["count"] += 1;
			$survey_data[$key]["survey_name"][] = $post_name;
		}
	}
	$update_data = json_encode($survey_data, JSON_UNESCAPED_UNICODE);
	db("UPDATE `t_user_letter` SET `survey` = '{$update_data}' WHERE `letter_id` = '{$id}'");
	header("Location:./letter.php?" . http_build_query($_GET));
	exit;
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
	<title>お手紙が届きました</title>
</head>

<body>
	<div class="img_elem">
		<img src="data:image/png;base64,<?php echo $img_data; ?>">
	</div>
	<div class="additional">
		<?php

		if (!empty($_GET["title"]) && !$is_survey) {
			$title = $_GET["title"];
			echo <<<EOD
				<form action="" method="post" class="survey-form">
					<div class="survey-contents">
						<div class="survey-title"><h3>{$title}</h3></div>
						<div class="respondent">
							<label for="respondent-title"><h4>お名前</h4></label>
							<input type="text" id="respondent-title" name="respondent-name" required>
						</div>		
				EOD;

			foreach ($_GET["survey"] as $key => $value) {
				echo <<<EOD
						<div class="survey">
							<input type="radio" name="survey" value="{$value}" id="survey{$key}" required>
							<label for="survey{$key}" class="input-label"><div class="input-content"><h4>{$value}</h4></div></label>
						</div>
						
					
					EOD;
			}
			echo <<<EOD
					<div class="survey-submit">
						<input type="submit" name="submit" value="お返事する" id="submit" onclick="return submitChk()"this.disabled='true'>				
					</div>
					</div>
				</form>
				EOD;
		}
		if (!empty($_GET["gift_name"])) {
			echo <<<EOD
				<form action="" method="POST" class="gift-form">
					<div class="gift">
						<h3 class="gift-title">ギフトが届いています</h3>
						<h4 class="gift-name">{$gift_data[$_GET["store_name"]][$_GET["gift_name"]]["fullName"]}×{$_GET["count"]}</h4>
						<img class="gift-img" src="../img/{$gift_data[$_GET["store_name"]][$_GET["gift_name"]]["url"]}">
					</div>

					<div class="gift-submit">
						<input type="submit" name="gift" value="受け取る">
					</div>
				</form>
			EOD;
		}
		?>
	</div>
	<script>

		if (document.querySelector(".survey-form") == null) {
			var add_class_elem = document.querySelector(".gift-form");
			add_class_elem.classList.add("reset-margin");
		}

		function submitChk() {
			var flag = confirm("送信してもよろしいですか？\n\n送信したくない場合は[キャンセル]ボタンを押して下さい");
			if (flag) {
				alert("送信しました！ありがとうございます。");
			}
			return flag;
		}

	</script>

</body>

</html>