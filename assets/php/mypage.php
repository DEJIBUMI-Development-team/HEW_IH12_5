<?php
include("./db.php");
include("./ChromePhp.php");
session_start();

if (!isset($_SESSION["user_id"])) {
	$_SESSION["HS"] = "mypage";
	header("Location:./login.php");
	exit;
}

if (!empty($_SESSION["user_id"])) {
	$user_id = $_SESSION["user_id"];
} else {
	$user_id = 1;
}

if (isset($_POST["delete"])) {
	$delete_edit_id = $_POST["delete_id"];
	db("DELETE FROM t_user_edit WHERE edit_id = {$delete_edit_id}");
	$_POST = array();
}

if (isset($_POST["new"])) {
	unset($_SESSION["edit_id"]);
	header("Location:./edit.php");
}

if (isset($_POST["restart_survey"])) {
	$open_survey_id = $_POST["open_id"];
	$open_data = db("SELECT survey FROM t_user_letter where letter_id = {$open_survey_id}");
	$open_data_json = json_decode($open_data[0]["survey"], true);
	if ($open_data_json["ending"]){
		$open_data_json["ending"] = false;
		$encode_survey_data = json_encode($open_data_json, JSON_UNESCAPED_UNICODE);
		db("UPDATE `t_user_letter` SET `survey` = '{$encode_survey_data}' WHERE `letter_id` = '{$open_survey_id}'");
	}
	header("Location:./mypage.php");
	exit;
}

if (isset($_POST["finish_survey"])) {
	$close_survey_id = $_POST["close_id"];
	$close_data = db("SELECT survey FROM t_user_letter where letter_id = {$close_survey_id}");
	$close_data_json = json_decode($close_data[0]["survey"], true);
	if (!$close_data_json["ending"]){
		$close_data_json["ending"] = true;
		$encode_survey_data = json_encode($close_data_json, JSON_UNESCAPED_UNICODE);
		db("UPDATE `t_user_letter` SET `survey` = '{$encode_survey_data}' WHERE `letter_id` = '{$close_survey_id}'");
	}
	header("Location:./mypage.php");
	exit;
}


$data = db("SELECT edit_id, title FROM t_user_edit where F_user_id = {$user_id}");
$data = json_encode($data);

if (isset($_POST["logout"])) {
	$_SESSION = array();
	header("Location:../../index.php");
	session_destroy();
}

$survey_flg = false;
$survey_data = db("SELECT letter_id, name, survey FROM t_user_letter where F_user_id = {$user_id}");
$survey_result = array_column($survey_data, "survey");
$survey_id = array_column($survey_data, "letter_id");

if (isset($survey_result)){
	$survey_flg = true;
	$chert_contents = [];

	foreach ($survey_result as $key => $value) {
		if ($value == null) {
			continue;
		}
		$chert_contents[$key] = [
			json_decode($value, true),
			$survey_id[$key]
		];
	}

};
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/mypage.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<title>マイページ</title>
</head>

<body>
	<header class="navigator scroll_tgl">
  <div class="navigator_content">
    <div class="navigator_left">
      <a href="/HEW_IH12_5/index.php"><img src="/HEW_IH12_5/assets/img/logo.png" alt="logo"></a>
      <a href="/HEW_IH12_5/assets/php/edit.php">でじぶみを新規作成</a>
      <a href="/HEW_IH12_5/assets/php/gift.php">ギフト</a>
      <a href="/HEW_IH12_5/assets/php/mypage.php">マイページ</a>
    </div>
    
    <div class="navigator_right">
      <a href="/HEW_IH12_5/assets/php/signup.php">会員登録</a>
      <a href="/HEW_IH12_5/assets/php/login.php">ログイン</a>
    </div>
  </div>
</header>
	<h2>マイページ</h2>
	<div class="user_icon">
		<img src="../img/user_icon.svg" alt="マイページ">
		<p>
			a		</p>
	</div>
	<div class="container">
		<div class="set-flex">
			<div class="item n01 switch_elem check dejibumi"><div class="a"><img src="../img/画面.svg" alt="決済情報"><br></div>
				<p>でじぶみ一覧</p>
			</div>
			<div class="item n02 switch_elem question"><div class="a" ><img src="../img/アンケート.svg" alt="クレジットカード"></div>
				<p>お返事</p>
			</div>
			<div class="item n03"><a href="barcode.php"><img src="../img/dredit.jpg" alt="バーコード決済"></a>
				<p>クレジットカード</p>
			</div>
			<div class="item n04">
				<form action="" method="POST">
					<label for="logout" class="logout" type="submit" name="logout"><img src="../img/logout.png" alt="ログアウト">
						<p>ログアウト</p>
					</label>
					<input type="submit" name="logout" id="logout" style="display: none;">
				</form>
			</div>
		</div>
	</div>
	<div class="view-history" id="history">
		<form class="new_edit" id="new_creation" method="POST" onsubmit="newSubmit()">
			<input type="submit" name="new" value="でじぶみを新規作成">
		</form>
	</div>

	<div class="questionnaire" style="display:none">
			</div>

	<!-- <form action="" method="POST">
		<input type="submit" name="logout" value="ログアウト">
	</form> -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		const click_element = document.querySelectorAll(".switch_elem");
		const questionnaire_element = document.querySelector(".questionnaire");
		const dejibumi_list_element = document.querySelector(".view-history");

		click_element.forEach((element, _) =>{
			element.addEventListener("click",()=>{
				if (!element.classList.contains("check")) {
					if(element.classList.contains("dejibumi")){
						var not_check = document.querySelector(".question");
						not_check.classList.remove("check");
						element.classList.add("check");

						questionnaire_element.style.display = "none";
						dejibumi_list_element.style.display = "block";

					}else{
						var not_check_1 = document.querySelector(".dejibumi");
						not_check_1.classList.remove("check");
						element.classList.add("check");

						questionnaire_element.style.display = "block";
						dejibumi_list_element.style.display = "none";
					} 
				}
			});
			
		});


		// mypage.jsに対して、sqlの結果を返す
		function get_edit_history() {
			var data = JSON.parse('[]');
			return data;
		}

		window.onload = async function () {
			try {
				// debugger;
				var insert_pr = document.getElementById("history");
				var edit_history = await get_edit_history();

				if (!edit_history.length == 0) {
					edit_history.forEach((elem) => {
						console.log(elem.title);
						insert_pr.insertAdjacentHTML("beforeend", create_history_dom(elem.edit_id, elem.title));
					});
				} else {
					console.log("NO Data");
					insert_pr.insertAdjacentHTML("beforeend", create_history_dom("", ""));
				}

				const redraw_element = document.querySelectorAll(".history-content");
				redraw_element.forEach(element => {
					element.addEventListener("click", (e) => {
						var id = get_id(e, "edit_id");
						location.href = "./edit.php?edit_id=" + encodeURIComponent(id);
					});
				});
			} catch (error) {
				console.log(error);
			}

		}

		function create_history_dom(id, title) {
			if (!id && !title) {
				return `
					<div class="history-content">編集した手紙のデータはありません</div>
				`;
			}

			return `
				<div class="history-content" data-edit_id="${id}">
					<div class="history" data-edit_id="${id}">
						<div class="history-id" data-edit_id="${id}">編集画面ID : ${id}</div>
						<div class="history-title" data-edit_id="${id}">タイトル : ${title}</div>
					</div>
					<form method="POST" class="delete" onsubmit="return deleteSubmit()">
						<input type="hidden" name="delete_id" value="${id}">
						<input type="submit" name="delete" value="削除する">
					</form>
				</div>
			`;
		}

		function get_id(event, specified_key) {
			clickedDom = event.composedPath();
			return clickedDom[0].dataset[specified_key];
		}
		function deleteSubmit() {
			if (window.confirm('このでじぶみデータを削除しますが、よろしいですか？')) {
				return true;
			} else {
				return false;
			}
		}
		function newSubmit() {
			if (window.confirm('でじぶみを新規作成しますか？')) {
				return true;
			} else {
				return false;
			}
		}
			
	</script>
</body>

</html>