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


$data = db("SELECT edit_id, title FROM t_user_edit where F_user_id = {$user_id}");
$data = json_encode($data);

if (isset($_POST["logout"])) {
	$_SESSION = array();
	header("Location:../../index.php");
	session_destroy();
}
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
	<?php include("./header.php")?>
	<h2>マイページ</h2>
	<div class="user_icon">
		<img src="../img/user_icon.svg" alt="マイページ">
		<p>
			<?php echo $_SESSION["user_name"]; ?>
		</p>
	</div>
	<div class="container">
		<div class="set-flex">
			<div class="item n01"><a href="kessai.php"><img src="../img/kessai.jpg" alt="決済情報"><br></a><p>決済情報</p></div>
			<div class="item n02"><a href="dredit.php"><img src="../img/dredit.jpg" alt="クレジットカード"></a><p>クレジットカード</p></div>
			<div class="item n03"><a href="barcode.php"><img src="../img/barcode.png" alt="バーコード決済"></a><p>バーコード決済</p></div>
			<div class="item n04"><a href="logout.php"><img src="../img/logout.png" alt="ログアウト"></a><p>ログアウト</p></div>
		</div>
	</div>
	<div class="view-history" id="history">
		<form class="new_edit" id="new_creation" method="POST" onsubmit="newSubmit()">
			<input type="submit" name="new" value="でじぶみを新規作成">
		</form>
	</div>
	<!-- <form action="" method="POST">
		<input type="submit" name="logout" value="ログアウト">
	</form> -->
	<script>
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
	</script>
</body>

</html>