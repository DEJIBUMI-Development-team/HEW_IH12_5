<?php
// セッション開始
session_start();
include("./ChromePhp.php");
require_once("./db.php");
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
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        
        //クエリをdb.php上のfunction db()に引き渡す
        $row = db("SELECT user_name, password FROM t_user WHERE user_name = '{$userName}'");
        
        //階層を一段階浅くする
        $merge_row = call_user_func_array("array_merge", $row);
        //結果情報表示ログ
        ChromePhp::log($merge_row);

        //ユーザ―判定
        if ($userName == $merge_row["user_name"]) {
            // パスワード判定

            // "承認成功" 対象サイトに遷移
            // settion内部のvalueを検索して、遷移画面を設定
            
            // ↓一例
            // if ($_SESSION["..."] == "...") {
            //     header("./....php"); 
            // }elseif($_SESSION["..."] == ",,,"){
            //     header("./,,,,.php");
            // }

            // クリック要素ごとにSESSIONの値を入力
            if (isset($_POST['ScreenTransition'])){
                // 編集ボタンクリックで"edit"を代入
                if ($_SESSION['HS'] == "edit") {
                    $result = "編集画面で";
                    header("Location:assets/php/edit.php");
                  }
                  // マイページボタンクリックで"mypage"を代入
                if ($_SESSION['HS'] == "mypage") {
                    $result = "マイページで";
                    header("Location:assets/php/");
            }

            
            // ハッシュ値での格納が実装完了した際にコメントを外す
            // if (password_verify($password,  $merge_row["password"])) {

            // }else {
            //     $errorMessage = "ユーザ―名または、パスワードに誤りがあります";
            // }
        }else {
            $errorMessage = "ユーザ―名または、パスワードに誤りがあります!";
        }

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
    <link rel="stylesheet" href="../css/login.css">
    <meta name="robots" content="none,noindex,nofollow">
</head>
<body class="Login_body">
    <main>
        <div id="backgrounds">
			<div class="water1"></div>
		</div>

        <div id="first_view">
			<img class="icon" src="../img/logo.png" alt="">
		</div>
        
        <div class="Login_fo"rm>
            <form id="loginForm" name="loginForm" action="" method="POST">
                    <div class="user_info">
                        <p class="Login_NM">ユーザー名</p>    
                        <div class="error">
                            <font color="#ff0000">
                                <?php print htmlspecialchars($errorMessage, ENT_QUOTES); ?>
                            </font>
                        </div>
                    </div>
                    <label for="userName"></label><input class="User" type="text" id="userName" name="userName" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["userName"])) {echo htmlspecialchars($_POST["userName"], ENT_QUOTES);} ?>">
                        
                    <p class="Login_PW">パスワード</p>
                    <label for="password"></label>
                    <input class="User" type="password" id="password" name="password" value="" placeholder="パスワードを入力"> 
                    <input type="hidden" name="ticket" value="<?php print $ticket?>">
                    <br>
                    <div class="Login_ticket">
                        <form action="a.php" method="post">
                            <input type="submit" class="Login_submit" id="login" name="login ScreenTransition" value="ログイン">
                        </form>
                    </div>
            </form>

            <div class="action">
                <!-- <a href="./SingnUp.php" class="SingnUp">会員登録はこちらから</a> -->
                <a href="../../index.php" class="Top">トップへ戻る</a>
            </div>
        </div>
    </main>    
</body>
</html>
<!-- HTML !-->
