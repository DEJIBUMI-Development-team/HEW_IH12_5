<?php
include("./ChromePhp.php");
include("db.php");

$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw); // json形式をphp変数に変換
// ChromePhp::log($data);
$edit_id = $data->{"edit_id"};
// ChromePhp::log($edit_id);

$elem = db("SELECT content_data FROM t_user_edit where edit_id = {$edit_id}");

$response = $elem[0]["content_data"];

// ChromePhp::log($response);
echo $response; // json形式にして返す