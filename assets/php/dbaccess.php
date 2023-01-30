<?php
$db['host'] = "mysql57.dejibumi.sakura.ne.jp";  // DBサーバのURL
$db['username'] = "dejibumi";  // ユーザー名
$db['password'] = "dejibumi-0";  // ユーザー名のパスワード
$db['dbname'] = "dejibumi_db";  // データベース名
$dsn = 'mysql:host=mysql57.dejibumi.sakura.ne.jp;dbname=dejibumi_db;charset=utf8';
try {
    // Mysqlへの接続への接続を確立
    $pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    $msg = 'データベースの接続に失敗しました。';
}
?>