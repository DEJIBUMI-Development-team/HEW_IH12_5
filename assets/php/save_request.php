<?php
session_start();
include("./ChromePhp.php");
include("db.php");

$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
// ChromePhp::log($raw);
$data = json_decode($raw); // json形式をphp変数に変換
ChromePhp::log($data);

$res = json_encode($data, JSON_UNESCAPED_UNICODE); // やりたい処理

$user_id = $_SESSION["user_id"];

if (!empty($_GET["edit_id"])) {
	$_SESSION["edit_id"] = $_GET["edit_id"];
}

if (isset($_SESSION["edit_id"])) {
	$edit_id = $_SESSION["edit_id"];
}

$db_input = [
	"table_name" => "t_user_edit",
	"user_id" => $_SESSION["user_id"],
	"title" => $data->title,
];

if (isset($edit_id)) {
	$db_input["edit_id"] = $edit_id;
	$elem = db("SELECT * FROM t_user_edit where edit_id = {$edit_id}");
}else {
	$elem = array();
}

if (empty($elem)) {
	// レコード追加
	ChromePhp::log("INSERT");
	db("INSERT INTO `t_user_edit`(`edit_id`, `F_user_id`, `title`, `content_data`) VALUES (
		'',
		'{$db_input["user_id"]}',
		'{$db_input["title"]}',
		'{$res}'
	)");
	$_SESSION["edit_id"] = $_SESSION["last_id"];
	$edit_id = $_SESSION["edit_id"];
} else {
	// レコード更新
	ChromePhp::log("UPDATE");
	db("UPDATE `t_user_edit` SET title = '{$db_input["title"]}', content_data = '{$res}' WHERE `edit_id` = {$edit_id}");
}

$get_elem = db("SELECT content_data FROM t_user_edit where edit_id = {$edit_id}");

// ChromePhp::log
// echoすると返せる
$response = $get_elem[0]["content_data"];

// ChromePhp::log($response);
echo $response; // json形式にして返す