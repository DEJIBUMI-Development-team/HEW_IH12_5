<?php
session_start();
require("./dbaccess.php");
 
/* 登録の手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: signup.php');   // セッションがない場合 signup.phpへ移動
    exit();
}
 
if (!empty($_POST['check'])) {
    // パスワードを暗号化
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);
 
    // 入力情報をデータベースに登録
    $statement = $pdo->prepare("INSERT INTO t_user SET user_name=?, e_mail=?, password=?");
    $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        $hash
    ));
 
    unset($_SESSION['join']);   // セッションを破棄
    header('Location: test.php');   // test.phpへ移動
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="../css/check.css">
	<link rel="shortcut icon" href="../css/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="backgrounds">
		<div class="water1 back"></div>
	</div>
    <div class="content">
        <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <h1 id="title">入力情報の確認</h1>
            <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p>登録情報はあとから変更することもできます。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            <?php endif ?>
            <hr id="line">
 
            <div class="user_information">
                <div class="control">
                    <p>ニックネーム</p>
                    <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?></span></p>
                </div>
    
                <div class="control">
                    <p>メールアドレス</p>
                    <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?></span></p>
                </div>

                <br>
                <a href="signup.php" class="back-btn">変更する</a>
                <button type="submit" class="btn next-btn">登録する</button>
                <div class="clear"></div>
            </div>
        </form>
    </div>
</body>
</html>