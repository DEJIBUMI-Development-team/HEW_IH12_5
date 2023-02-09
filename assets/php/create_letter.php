<?php
session_start();
$data = [];
$file = "../data/gift_data/gift.json";
$json_file = file_get_contents($file);
$gift_data = json_decode($json_file, true);

if (isset($_POST["submit"])) {
	if (!empty($_FILES["image"]["name"])) {
		$_SESSION["img_name"] = $_FILES["image"]["name"];
		$_SESSION["img_content"] = file_get_contents($_FILES["image"]["tmp_name"]);
		if (!empty($_POST["survey"])) {
			$data = [
				"title" => $_POST["survey_title"],
				"survey" => $_POST["survey"]
			];
		}
		if (!empty($_POST["product_settlement_name"])) {
			$_SESSION["product_name"] = $_POST["product_settlement_name"];
			$_SESSION["store_name"] = $_POST["store_settelement_name"];
			$_SESSION["gift_count"] = $_POST["gift_count"];
		}
		$data = http_build_query($data);
		header("Location:./settlement.php?{$data}");
	} else {
		echo "画像を選択してください";
	}
}
if (isset($_POST["count"])) {
	$count = $_POST["count"] == "" ?  1 : $_POST["count"]; 
	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/create_letter.css">
	<title>手紙設定画面</title>
</head>

<body>
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="form-content">
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
			<div class="additional-contents">
				<div class="survey-elements">
					<div class="survey-open">アンケート機能を利用する</div>
					<div class="survey hidden">
						<input type="text" name="survey_title" placeholder="アンケートタイトルを追加" class="input_element" disabled>
						<br>
						<div class="suvey-block" id="survey_elem">
							<div class="survey-contents">
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
				</div>
				<div class="gift-elements">
					<div class="gift-open">
						<a href="./gift.php" class="gift-select">ギフトを選択してください</a>
						<?php
						if (!empty($_POST["store"]) && !empty($_POST["product_name"])) {
							echo <<<EOD
								<div class="gift-name">{$gift_data[$_POST["store"]][$_POST["product_name"]]["fullName"]}×{$count}</div>
								<div class="gift-img">
									<img src='../img/{$gift_data[$_POST["store"]][$_POST["product_name"]]["url"]}' alt="">									
								</div>
								<input type="hidden" name="product_settlement_name" value='{$_POST["product_name"]}'>
								<input type="hidden" name="store_settelement_name" value='{$_POST["store"]}'>
								<input type="hidden" name="gift_count" value='{$count}'>
								<div class="gift-delete">ギフトを取り消す</div>					
							EOD;
						}
						?>
					</div>


				</div>
			</div>

		</div>
		<div class="product-item">
			<h3>お支払総額</h3>
			<div class="product-price">0円</div>
			<div class="product-breakdown">
				<div>------</div>
				<div class="dejibumi-price price">手紙設定料金 : 0円</div>
				<div class="survey-price price">アンケート利用料金 : 0円</div>
				<div class="gift-price price">ギフト総計 : 
					<?php echo !empty($_POST["store"]) ? $gift_data[$_POST["store"]][$_POST["product_name"]]["tall"] : 0?>円
				</div>
			</div>
			<input type="submit" value="お支払いはこちらから" name="submit" class="submit-input">
		</div>

	</form>

	<script>
		let total_price = 0;
		let img_price = 0;
		let survey_price = 0;
		let gift_price = 0;

		const total_view_content = document.querySelector(".product-price");
		const dejibumi_img = document.querySelector(".dejibumi-price");
		const survey_price_view = document.querySelector(".survey-price");
		const gift_prince_view = document.querySelector(".gift-price");

		var is_survey = false;
		var is_setImg = false;
		var is_setGift = <?php echo (isset($_POST["product_name"])) ? "true" :  "false"; ?>;

		window.onload = ()=>{
			set_price();
		};

		function set_price() {
			if (is_setImg) {
				img_price = 800;
			} else {
				img_price = 0;
			}

			if (is_survey) {
				survey_price = 500;
			} else {
				survey_price = 0;
			}
			if (is_setGift) {

				gift_price = <?php echo ($gift_data[$_POST["store"]][$_POST["product_name"]]["tall"]);?> * Number(<?php echo $count;?>)
			} else {
				gift_price = 0;
			}

			total_price = img_price + survey_price + gift_price;
			total_view_content.textContent = `${total_price}円`;
			dejibumi_img.textContent = `手紙設定料金 : ${img_price}円`;
			survey_price_view.textContent = `アンケート利用料金 : ${survey_price}円`;
			gift_prince_view.textContent = `ギフト総計 : ${gift_price}円`;
		}

		const add_button_elem = document.getElementById("add");
		const survey_elem = document.getElementById("survey_elem");

		add_button_elem.addEventListener("click", () => {
			survey_elem.insertAdjacentHTML("beforeend", '<div class="survey-contents"><input type="text" name="survey[]" placeholder="選択肢を追加" class="input_element"></div>');
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
			is_survey = true;
			survey_open.style.visibility = "hidden";
			set_price();
		});

		survey_exit.addEventListener("click", () => {
			input_elem.forEach((input) => {
				input.disabled = true;
			});
			survey.classList.add("hidden");
			survey_open.style.visibility = "visible";
			is_survey = false;
			set_price();
		});

		const delete_button_elem = document.getElementById("delete");
		delete_button_elem.addEventListener("click", () => {
			// debugger;
			var survey_contents = document.querySelectorAll(".survey-contents");
			if (survey_contents.length > 2) {
				var last_elem = survey_elem.lastElementChild;
				last_elem.remove();
			}

		});

		var fileArea = document.getElementById('dragDropArea');
		var fileInput = document.getElementById('fileInput');
		fileArea.addEventListener('dragover', function(evt) {
			evt.preventDefault();
			is_setImg = true;
			fileArea.classList.add('dragover');
			set_price();
		});
		fileArea.addEventListener('dragleave', function(evt) {
			evt.preventDefault();
			is_setImg = false;
			fileArea.classList.remove('dragover');
			set_price();
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
			debugger;
			var file = f;
			is_setImg = false;
			set_price();
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
				if (preview.hasChildNodes()) {
					is_setImg = true;
				} else {
					is_setImg = false;
				}
				set_price();
			};
			reader.readAsDataURL(file);
		}
	</script>
</body>

</html>