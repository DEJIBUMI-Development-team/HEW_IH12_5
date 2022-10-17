<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mypage.css">
    <title>マイページ</title>
</head>
<body>
<h2>でじぶみページ</h2>
<div class="user_icon">
  <img src="../img/user_icon.svg" alt="マイページ">
  <p>user_name<?php //echo h($login_user['name']) ?></p>
</div>
<div class="container">
  <div class="item n01"><p>・test<br>・test<br>・test<br>・test<br></p></div>
  <div>
    <div class="set-flex">
      <div class="item n02"><a href="kessai.php"><img src="../img/kessai.jpg" alt="決済情報"></a></div>
      <div class="item n03"><a href="dredit.php"><img src="../img/dredit.jpg" alt="クレジットカード"></a></div>
      <div class="item n04"><a href="test.php"><img src="none" alt="none"></a></div>
    </div>
    <div class="set-flex2">
      <div class="item n05"><a href="test.php"><img src="none" alt="none"></a></div>
      <div class="item n06"><a href="test.php"><img src="none" alt="none"></a></div>
      <div class="item n07"><a href="test.php"><img src="none" alt="none"></a></div>
    </div>
  </div>
</div>
<form action="logout.php" method="POST">
<input type="submit" name="logout" value="ログアウト">
</form>
</body>
</html>