<?php
session_start();
// データベースに接続
function connectDB() {
    $param = 'mysql:dbname=dejibumidb;host=localhost';
    try {
        $pdo = new PDO($param, 'root', '');
        return $pdo;

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
$pdo = connectDB();
$data = [];

if (isset($_POST["submit"])) {
	if (!empty($_FILES["image"]["name"])) {
		$img_name = $_FILES["image"]["name"];
		$content = file_get_contents($_FILES["image"]["tmp_name"]);
		$sql = 'INSERT INTO t_user_letter(F_user_id, name, raw_data) VALUES(
			:num,
			:img_name, 
			:content 
		)';
		// $stmt = $pdo->prepare($sql);
		// $stmt->bindValue(':num', 1, PDO::PARAM_INT);
		// $stmt->bindValue(':img_name', $img_name, PDO::PARAM_STR);
		// $stmt->bindValue(':content', $content, PDO::PARAM_STR);
		// $stmt->execute();
		// $id =  $pdo->lastInsertId();
		
		$id =  1;
		if (!empty($_POST["survey"])) {
			$data = [
				"id" => $id,
				"title" => $_POST["survey_title"],
				"survey" => $_POST["survey"]
			];
		}else {
			$data["id"] = $id; 
		}


		echo "http://localhost/HEW_IH12_5/assets/php/create_letter.php/?".http_build_query($data);

	}else {
		echo "画像を選択してください";
	}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.survey-open{
			margin: 20px 0px;
		}
		.hidden{
			display: none;
		}

		.exit{
			margin: 20px 0px;
		}
	</style>
</head>
<body>
	<form method="POST" action="" enctype="multipart/form-data">
		<input type="file" name="image">
		<br>

		<div class="survey-open">アンケート機能を利用する</div>

		<div class="survey hidden">
			<input type="text" name="survey_title" placeholder="アンケートタイトルを追加" class="input_element" disabled>
			<br>
			<div class="suvey-block" id="survey_elem">
				<div class="survery-contents">
					<input type="text" name="survey[]" placeholder="選択肢を追加" class="input_element" disabled>
				</div>

				<div class="survey-contents">
					<input type="text" name="survey[]" placeholder="選択肢を追加" class="input_element" disabled>
				</div>
			</div>
			<button id="add" type="button">追加</button>
			<button id="delete" type="button">削除</button>
			<div class="exit">閉じる</div>
		</div>


		<input type="submit" value="送信！" name="submit">
	</form>

	<script>
		const add_button_elem = document.getElementById("add");
		const survey_elem = document.getElementById("survey_elem");
		add_button_elem.addEventListener("click", ()=>{
			survey_elem.insertAdjacentHTML('afterbegin', '<div class="survey-contents"><input type="text" name="survey[]" placeholder="選択肢を追加" class="input_element"></div>');
		});

		const survey_open = document.querySelector(".survey-open");
		const survey_exit = document.querySelector(".exit");
		const survey = document.querySelector(".survey");
		const input_elem = document.querySelectorAll(".input_element")
		survey_open.addEventListener("click",()=>{
			survey.classList.remove("hidden");
			input_elem.forEach((input)=>{
				input.disabled = false;
			});
		});
		
		survey_exit.addEventListener("click", ()=>{
			input_elem.forEach((input)=>{
				input.disabled = true;
			});
			survey.classList.add("hidden");
		});

		const delete_button_elem = document.getElementById("delete");
		delete_button_elem.addEventListener("click", ()=>{
			// debugger;
			var survey_contents = document.querySelectorAll(".survey-contents")
			
			if (survey_contents.length > 2) {

				var last_elem = survey_elem.lastElementChild;
				last_elem.remove();	
			}
			
		});

	</script>
</body>
</html>


