<?php
// include("./ChromePhp.php");
function db($sql): mixed{
    // var_dump($sql);
    $db['host'] = "mysql57.dejibumi.sakura.ne.jp";  // DBサーバのURL
    $db['username'] = "dejibumi";  // ユーザー名
    $db['password'] = "dejibumi-0";  // ユーザー名のパスワード
    $db['dbname'] = "dejibumi_db";  // データベース名
    $dsn = 'mysql:host=dejibumi.sakura.ne.jp;dbname=dejibumi_db;charset=utf8';
    try {
        // Mysqlへの接続への接続を確立
        $pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        // var_dump("MySQL への接続確認が取れました。");
        // 特定要素を変数に代入
        $stml = $pdo->prepare($sql);
        $stml->execute();
        $_SESSION["last_id"] = $pdo->lastInsertId();
        return $stml->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
    } catch (PDOException $e) {
        echo $e;
        return $e;
    }

}