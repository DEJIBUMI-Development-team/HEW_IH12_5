<?php
session_start();
function connectDB()
{
	$db['host'] = "mysql57.dejibumi.sakura.ne.jp";  // DBサーバのURL
	$db['username'] = "dejibumi";  // ユーザー名
	$db['password'] = "dejibumi";  // ユーザー名のパスワード
	$db['dbname'] = "dejibumi_db";  // データベース名
	$dsn = 'mysql:host=mysql57.dejibumi.sakura.ne.jp; dbname=dejibumi_db;charset=utf8';
	try {
		// Mysqlへの接続への接続を確立
		$pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		return $pdo;
	} catch (PDOException $e) {
		exit($e->getMessage());	
	}

}

$pdo = connectDB();

if (isset($_POST["settlement"])) {
	$img_name = $_SESSION["img_name"];
	$content = $_SESSION["img_content"];
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
	$get_data = $_GET;
	$get_data["id"] = $id;
	$data = http_build_query($get_data);
	header("Location:./create_result.php?{$data}");
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>決済画面</title>
	<link rel="stylesheet" href="../css/settlement.css">
</head>

<body>
	<div class="container">
		<h1>決済画面</h1>
		<form action="" method="post">
			<div>
				<label for="card-number">カード番号</label>
				<input type="text" id="card-number" name="card-number">
			</div>
			<div>
				<label for="card-name">カード名義</label>
				<input type="text" id="card-name" name="card-name">
			</div>
			<div>
				<label for="card-expiry-month">有効期限 (月)(2桁)</label>
				<input type="text" id="card-expiry-month" name="card-expiry-month">
			</div>
			<div>
				<label for="card-expiry-year">有効期限 (年)(2桁)</label>
				<input type="text" id="card-expiry-year" name="card-expiry-year">
			</div>
			<div>
				<label for="card-security-code">セキュリティコード(3桁)</label>
				<input type="text" id="card-security-code" name="card-security-code">
			</div>
			<div>
				<button type="submit" name="settlement">決済する</button>
			</div>
		</form>
	</div>
</body>

</html>



<?php
