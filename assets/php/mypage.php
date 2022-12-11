<?php
	include("./db.php");
	$data =  db("SELECT edit_id, title FROM t_user_edit where F_user_id = 1");
	$data = json_encode($data);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mypage.css">
    <title>マイページ</title>
</head>
<body>
	<h2>でじぶみページ</h2>
	<div class="user_icon">
		<img src="../img/user_icon.svg" alt="マイページ">
		<p>user_name<?php //echo h($login_user['name']) ?></p>
	</div>
	<div class="container">
		<div class="item n01"><p>・test<br>・test<br>・test<br>・test<br></p></div>
		<div>
			<div class="set-flex">
				<div class="item n02"><a href="kessai.php"><img src="../img/kessai.jpg" alt="決済情報"></a></div>
				<div class="item n03"><a href="dredit.php"><img src="../img/dredit.jpg" alt="クレジットカード"></a></div>
				<!-- <div class="item n04"><a href="test.php"><img src="none" alt="none"></a></div> -->
			</div>
			<div class="set-flex2">
				<!-- <div class="item n05"><a href="test.php"><img src="none" alt="none"></a></div> -->
				<!-- <div class="item n06"><a href="test.php"><img src="none" alt="none"></a></div> -->
				<!-- <div class="item n07"><a href="test.php"><img src="none" alt="none"></a></div> -->
			</div>
		</div>
	</div>
	<div class="view-history" id="history">

	</div>
	<form action="logout.php" method="POST">
	<input type="submit" name="logout" value="ログアウト">
	</form>

	<script >
		
		window.onload = async function(){
			debugger;

			var insert_pr = document.getElementById("history");
			var edit_history = await get_edit_history();

			if (!edit_history.length == 0) {
				edit_history.forEach((elem)=>{
					console.log(elem.title);
					insert_pr.insertAdjacentHTML("afterbegin", create_history_dom(elem.edit_id, elem.title));
				});
			
			}else {
				console.log("NO Data");
				insert_pr.insertAdjacentHTML("afterbegin", create_history_dom("", ""));
			}

		}

		function get_edit_history() {
			var data = JSON.parse('<?php echo $data;?>');
			return data;
		}
		
		function create_history_dom(id, title){
			if (!id && !title) {
				return `
					<div class="history-no-content">編集した手紙のデータはありません</div>
				`;
			}

			return `
				<div class="history-content history">
					<div class="history-id">編集画面ID : ${id}</div><div class="history-tile">タイトル : ${title}</div>
				</div>
			`;
		}

		<?php
    		
		?>

	</script>
</body>
</html>