<?php
$db['host'] = "localhost";  // DBサーバのURL
$db['username'] = "root";  // ユーザー名
$db['password'] = "";  // ユーザー名のパスワード
$db['dbname'] = "dejibumidb";  // データベース名
$dsn = 'mysql:host=localhost;port=3306;dbname=dejibumidb;charset=utf8';
try {
    // Mysqlへの接続への接続を確立
    $pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    $msg = 'データベースの接続に失敗しました。';
}
?>