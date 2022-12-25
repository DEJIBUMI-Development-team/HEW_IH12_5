<?php
session_start();
require("./dbaccess.php");
 
if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['email'] === "") {
        $error['email'] = "blank";
    }
    if ($_POST['password'] === "") {
        $error['password'] = "blank";
    }
    
    /* メールアドレスの重複を検知 */
    if (!isset($error)) {
        $t_user = $pdo->prepare('SELECT COUNT(*) as cnt FROM t_user WHERE e_mail=?');
        $t_user->execute(array(
            $_POST['email']
        ));
        $record = $t_user->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }
    }
 
    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: check.php');   // check.phpへ移動
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>アカウント作成</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body class="signup_body">

    <main>
        <div id="backgrounds">
                <div class="water1"></div>
        </div>
        
        <div id="first_view">
            <img class="icon" src="../img/logo.png" alt="">
        </div>

        <div class="content signup_fo">
            <form id="signupForm" name="signupForm" action="" method="POST">
                <!-- <h1>アカウント作成</h1>
                <p>でじぶみをご利用するために、次のフォームに必要事項をご記入ください。</p>
                <br> -->
    
                <div class="control">
                    <label for="name" class="signup_NM">ユーザー名</label>
                    <input id="name" type="text" name="name">
                </div>
    
                <div class="control">
                    <label for="email" class="signup_NM">メールアドレス<span class="required">必須</span></label>
                    <input id="email" type="email" name="email">
                    <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                        <p class="error">＊メールアドレスを入力してください</p>
                    <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
                        <p class="error">＊このメールアドレスはすでに登録済みです</p>
                    <?php endif ?>
                </div>
    
                <div class="control">
                    <label for="password" class="signup_NM">パスワード<span class="required">必須</span></label>
                    <input id="password" type="password" name="password">
                    <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
                        <p class="error">＊パスワードを入力してください</p>
                    <?php endif ?>
                </div>
    
                <div class="control">
                    <button type="submit" class="btn signup_submit">確認</button>
                </div>

                <a href="../../assets/php/login.php">ログインする</a>
            </form>
        </div>
    </main>
</body>
</html>