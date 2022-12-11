<?php
include("./ChromePhp.php");
include("db.php");
$db_input = [
	"table_name" => "t_user_edit",
	"tmp_edit_id" => 2,
	"tmp_user_id"=> 1,
	"tmp_temp_cd" => 11,
	"tmp_title" => "test_title",
];

$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
// ChromePhp::log($raw);
$data = json_decode($raw); // json形式をphp変数に変換
ChromePhp::log($data);

$res = json_encode($data, JSON_UNESCAPED_UNICODE); // やりたい処理


$elem = db("SELECT * FROM t_user_edit where edit_id = 2");
if (empty($elem[0])) {
	// レコード追加
	ChromePhp::log("INSERT");
	db("INSERT INTO `t_user_edit`(`edit_id`, `F_user_id`, `temp_cd`, `title`, `content_data`) VALUES (
		'{$db_input["tmp_edit_id"]}',
		'{$db_input["tmp_user_id"]}',
		'{$db_input["tmp_temp_cd"]}',
		'{$db_input["tmp_title"]}',
		'{$res}'
	)");
}else {
	// レコード更新
	ChromePhp::log("UPDATE");
	db("UPDATE `t_user_edit` SET title = '{$db_input["tmp_title"]}', content_data = '{$res}' WHERE `edit_id` = 1");
}

$get_elem = db("SELECT content_data FROM t_user_edit where edit_id = 1");

ChromePhp::log($get_elem);
// echoすると返せる
$response = $get_elem[0]["content_data"];

ChromePhp::log($response);
echo $response; // json形式にして返す