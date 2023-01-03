<?php
session_start();
// データベースに接続
function connectDB()
{
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
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':num', 1, PDO::PARAM_INT);
		$stmt->bindValue(':img_name', $img_name, PDO::PARAM_STR);
		$stmt->bindValue(':content', $content, PDO::PARAM_STR);
		$stmt->execute();
		$id =  $pdo->lastInsertId();
		if (!empty($_POST["survey"])) {
			$data = [
				"id" => $id,
				"title" => $_POST["survey_title"],
				"survey" => $_POST["survey"]
			];
		} else {
			$data["id"] = $id;
		}

		$data = http_build_query($data);
		header("Location:./settlement.php?{$data}");
	} else {
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
		.survey-open {
			margin: 20px 0px;
		}

		.hidden {
			display: none;
		}

		.exit {
			margin: 20px 0px;
		}

		#dragDropArea {
			background-color: #f4f4f4;
			margin: 10px;
			padding: 10px;
			border: #ddd dashed 5px;
			min-height: 200px;
			text-align: center;
		}

		#dragDropArea p {
			color: #999;
			font-weight: bold;
			font-size: 14px;
			font-size: 1.4em;
		}

		#dragDropArea .drag-drop-buttons {
			margin-top: 20px;
			font-size: 12px;
			font-size: 1.2em;
		}

		.drag-drop-buttons input {
			margin: auto;
		}
	</style>
</head>

<body>
	<form method="POST" action="" enctype="multipart/form-data">
		<div id="dragDropArea">
			<div class="drag-drop-inside">
				<p class="drag-drop-info">ここにファイルをドロップ</p>
				<p>または</p>
				<p class="drag-drop-buttons">
					<input id="fileInput" type="file" accept="image/*" value="ファイルを選択" name="image" onChange="photoPreview(event)">
				</p>
				<div id="previewArea"></div>
			</div>
		</div>
		<!-- <input type="file" name="image">
		<br> -->

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
		add_button_elem.addEventListener("click", () => {
			survey_elem.insertAdjacentHTML('afterbegin', '<div class="survey-contents"><input type="text" name="survey[]" placeholder="選択肢を追加" class="input_element"></div>');
		});

		const survey_open = document.querySelector(".survey-open");
		const survey_exit = document.querySelector(".exit");
		const survey = document.querySelector(".survey");
		const input_elem = document.querySelectorAll(".input_element")
		survey_open.addEventListener("click", () => {
			survey.classList.remove("hidden");
			input_elem.forEach((input) => {
				input.disabled = false;
			});
		});

		survey_exit.addEventListener("click", () => {
			input_elem.forEach((input) => {
				input.disabled = true;
			});
			survey.classList.add("hidden");
		});

		const delete_button_elem = document.getElementById("delete");
		delete_button_elem.addEventListener("click", () => {
			// debugger;
			var survey_contents = document.querySelectorAll(".survey-contents")

			if (survey_contents.length > 2) {

				var last_elem = survey_elem.lastElementChild;
				last_elem.remove();
			}

		});
		var fileArea = document.getElementById('dragDropArea');
		var fileInput = document.getElementById('fileInput');
		fileArea.addEventListener('dragover', function(evt) {
			evt.preventDefault();
			fileArea.classList.add('dragover');
		});
		fileArea.addEventListener('dragleave', function(evt) {
			evt.preventDefault();
			fileArea.classList.remove('dragover');
		});
		fileArea.addEventListener('drop', function(evt) {
			evt.preventDefault();
			fileArea.classList.remove('dragenter');
			var files = evt.dataTransfer.files;
			console.log("DRAG & DROP");
			console.table(files);
			fileInput.files = files;
			photoPreview('onChenge', files[0]);
		});

		function photoPreview(event, f = null) {
			var file = f;
			if (file === null) {
				file = event.target.files[0];
			}
			var reader = new FileReader();
			var preview = document.getElementById("previewArea");
			var previewImage = document.getElementById("previewImage");

			if (previewImage != null) {
				preview.removeChild(previewImage);
			}
			reader.onload = function(event) {
				var img = document.createElement("img");
				img.setAttribute("src", reader.result);
				img.setAttribute("id", "previewImage");
				preview.appendChild(img);
			};

			reader.readAsDataURL(file);
		}
	</script>
</body>

</html>