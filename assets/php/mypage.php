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
	<title>マイページ</title>
</head>

<body>
	<?php include("./header.php") ?>
	<h2>マイページ</h2>
	<div class="user_icon">
		<img src="../img/user_icon.svg" alt="マイページ">
		<p>
			<?php echo $_SESSION["user_name"]; ?>
		</p>
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
			<div class="item n04"><a href="logout.php" class="logout"><img src="../img/logout.png" alt="ログアウト"></a>
				<p>ログアウト</p>
			</div>
		</div>
	</div>
	<div class="view-history" id="history">
		<form class="new_edit" id="new_creation" method="POST" onsubmit="newSubmit()">
			<input type="submit" name="new" value="でじぶみを新規作成">
		</form>
	</div>

	<div class="questionnaire" style="display:none">
		<?php if($survey_flg){
			foreach ($chert_contents as $key => $chert) {
				
				echo <<<EOD
					<h4>お返事名 : {$chert[0]["title"]}</h4>
				EOD;
				if (isset($chert[0]["ending"])) {
					$result = "";
					$chert_status = $chert[0]["ending"];
					if (!$chert_status) {
						$result =  "投票期間中";
						echo <<<EOD
						<form action="" method="POST" class="question-status">
							<h4>{$result} : </h4>
							<input type="submit" value="投票を終了する" name="finish_survey" class="finish">
							<input type="hidden" name="close_id" value="{$chert[1]}">
						</form>
						EOD;
					}else {
						$result =  "投票終了";
						echo <<<EOD
						<form class="question-status" action="" method="POST">
							<h4>{$result} : </h4>
							<input type="submit" value="投票を再開する" name="restart_survey" class="finish">
							<input type="hidden" name="open_id" value="{$chert[1]}">
						</form>
						EOD;
					}
				}
				echo <<<EOD
					<div class="question-content">
						<div class="quertion">
							<canvas id="myChart-{$key}"></canvas>
						</div>
						<div class="result-table">
							<div class="table-content">
								<div class="tbl-elem tbl-1 tbl-title">{$chert[0][0]["survey_select"]}</div>
								<div class="tbl-elem tbl-2 tbl-title">{$chert[0][1]["survey_select"]}</div>
							</div>
				EOD;
				
				$all_element_count = (count($chert[0][0]["survey_name"]) >= count($chert[0][1]["survey_name"])) ? count($chert[0][0]["survey_name"]) : count($chert[0][1]["survey_name"]);

				for ($i=0; $i < $all_element_count; $i++) {
					$chert_elem_0 = isset($chert[0][0]["survey_name"][$i]) ? $chert[0][0]["survey_name"][$i] : "";
					$chert_elem_1 = isset($chert[0][1]["survey_name"][$i]) ? $chert[0][1]["survey_name"][$i] : "";
					echo <<<EOD
							<div class="table-content">
								<div class="tbl-elem tbl-1">{$chert_elem_0}</div>
								<div class="tbl-elem tbl-2">{$chert_elem_1}</div>
							</div>
					EOD;
				}
				echo <<<EOD
						</div>
					</div>
				EOD;

			}
		}
		?>
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
			var data = JSON.parse('<?php echo $data; ?>');
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
		<?php if($survey_flg){ 
			foreach ($chert_contents as $key => $chert) {?>
			var ctx = document.getElementById('myChart-<?php echo $key;?>');
			new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["<?php echo $chert[0][0]["survey_select"];?>", "<?php echo $chert[0][1]["survey_select"];?>"],
				
				datasets: [
					{
						backgroundColor:["#f2ffe5", "#fff2e5"],
						label: "<?php echo $chert[0]["title"];?>",
						data: [<?php echo $chert[0][0]["count"] ;?>, <?php echo $chert[0][1]["count"] ;?>],
						borderWidth: 1,
					}
				]
			},

			options: {
				scales: {
				y: {
					beginAtZero: true
				}
				},
				plugins: {
					legend: {
						display: false
					}
				}
			}
			});
		<?php }}?>
	
	</script>
</body>

</html>