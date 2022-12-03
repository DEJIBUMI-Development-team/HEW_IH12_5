<?php

function db($sql): mixed{
    // var_dump($sql);
    $db['host'] = "localhost";  // DBサーバのURL
    $db['username'] = "root";  // ユーザー名
    $db['password'] = "";  // ユーザー名のパスワード
    $db['dbname'] = "dejibumidb";  // データベース名
    $dsn = 'mysql:host=localhost;port=3306;dbname=dejibumidb;charset=utf8';
    try {
        // Mysqlへの接続への接続を確立
        $pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        // var_dump("MySQL への接続確認が取れました。");
        // 特定要素を変数に代入
        $stml = $pdo->prepare($sql);
        $stml->execute();
        return $stml->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
    } catch (PDOException $e) {
        return $e;
    }

}