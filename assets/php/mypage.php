<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mypage.css">
    <title>マイページ</title>
</head>
<body>
<h2>マイページ</h2>
<p>ログインユーザ：<?php //echo h($login_user['name']) ?></p>
<p>メールアドレス：<?php //echo h($login_user['email']) ?></p>
<form action="logout.php" method="POST">
<input type="submit" name="logout" value="ログアウト">
</form>
</body>
</html>