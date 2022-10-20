<?php
// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['username'] = "root";  // ユーザー名
$db['password'] = "";  // ユーザー名のパスワード
$db['dbname'] = "dejibumidb";  // データベース名

// エラーメッセージの初期化
$errorMessage = "";
$msg="";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["userName"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザー名が未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    if (!empty($_POST["userName"]) && !empty($_POST["password"])) {
        // 入力したユーザIDとPWを格納
        $userid = $_POST["userName"];
        $password = $_POST["password"];
        // ユーザIDとパスワードが入力されていたら認証する
        $dsn = 'mysql:host=localhost;port=3306;dbname=dejibumidb;charset=utf8';

        // エラー処理
        try {
            // Mysqlへの接続への接続を確立
            $pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $msg = "MySQL への接続確認が取れました。";
            // 特定要素を変数に代入
            // $stmt = $pdo->query('SELECT * FROM **** ORDER BY num DESC');



        } catch (PDOException $e) {
            $msg = 'データベースエラー';
        }



    }
}

?>

<!doctype html>
<html>
    <head>
        <meta name="robots" content="none.noindex">
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="../css/login.css?v=2"type='text/css'>
        <link rel="shortcut icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
        <link rel="icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
        <meta name="robots" content="none,noindex,nofollow">
    </head>
    <body class="Login_body">
            <h1>LOGIN</h1> 
            <div class="Login_form">
                <form id="loginForm" name="loginForm" action="" method="POST">
                        <div class="user_info">
                            <p class="Login_NM">ユーザー名</p>    
                            <div class="error"><font color="#ff0000"><?php print htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                        </div>
                        <label for="userName"></label><input class="User" type="text" id="userName" name="userName" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["userName"])) {echo htmlspecialchars($_POST["userName"], ENT_QUOTES);} ?>">
                        
                        <p class="Login_PW">パスワード</p>
                        <label for="password"></label><input class="User" type="password" id="password" name="password" value="" placeholder="パスワードを入力"> 
                        <input type="hidden" name="ticket" value="<?php print $ticket?>">
                        <br>
                        <input type="submit" class="Login_submit" id="login" name="login" value="ログイン">
                        <p><?php $msg; ?></p>
                </form>

                <div class="action">
                    <!-- <a href="./SingnUp.php" class="SingnUp">会員登録はこちらから</a> -->
                    <a href="../../index.html" class="Top">トップへ戻る</a>
                </div>
            </div>
    </body>
</html>