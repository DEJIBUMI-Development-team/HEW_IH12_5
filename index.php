<?php
session_start();
    $result = "";
    if (isset($_POST['add'])) {
      $_SESSION['HS'] = 'edit';//セッション変数に登録
      $result = "編集画面で";
      // echo $_SESSION['HS'];
      header("Location:a.php");
    }
    elseif (isset($_POST['update'])) {
      $_SESSION['HS'] = 'mypage';//セッション変数に登録
      $result = "マイページで";
      // echo $_SESSION['MY'];
      header("Location:a.php");
    }
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>でじぶみ</title>
		<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
		<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/reset.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/animation.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-6-2/css/9-6-2.css">
	</head>
	<body>
		<header></header>
		<main>

			<div id="backgrounds">
				<div class="water1 back"></div>
			</div>

			<div id="first_view">
			 <div class="blur">届けよう、その想い。</div>
			 <div><img class="icon" src="assets/img/logo.png" alt=""></div>
			</div>

			<div id="first_content">
			 <!-- <video controls src="assets/img/dejibumi.mp4" style="height: 50%;"></video> -->
			 <h2>でじぶみ説明動画</h2>
       <!-- 無限に波が広がる -->
       <a href="assets/img/dejibumi.mp4" class="btnripple2 video-open"><span></span></a>
			</div>

			<div id="second_content" class="cf">
			<div id="top_wrapper">

				 <!-- 見出しnumber -->
				 <form action="index.php" method="post">
				  <button type="submit" name="update"><h2 id="lnk_00" class="obj trans_bg lnk action"><img src="assets/img/00.jpg" alt=""></h2></button>
					<button type="submit" name="update"><h2 id="lnk_01" class="obj trans_bg lnk action"><img src="assets/img/01.jpg" alt=""></h2></button>
					<button type="submit" name="update"><h2 id="lnk_02" class="obj trans_bg lnk action"><img src="assets/img/02.jpg" alt=""></h2></button>
					<button type="submit" name="update"><h2 id="lnk_03" class="obj trans_bg lnk action"><img src="assets/img/03.jpg" alt=""></h2></button>
				 </form>

				 <!-- コンテンツ写真 -->
				 <form action="index.php" method="post">
				  <a href="assets/php/signup.php"><img src="./assets/img/photo_01.jpg" id="photo_01" class="obj photo Shadow fadeInTrigger" alt=""/></a>
					<a href="assets/php/signup.php"><img src="./assets/img/photo_02.jpg" id="photo_02" class="obj photo Shadow fadeInTrigger" alt=""/></a>
					<a href="assets/php/signup.php"><img src="./assets/img/photo_03.jpg" id="photo_03" class="obj photo Shadow fadeInTrigger" alt=""/></a>
					<a href="assets/php/signup.php"><img src="./assets/img/photo_04.jpg" id="photo_04" class="obj photo Shadow fadeInTrigger" alt=""/></a>
					<a href="assets/php/signup.php"><img src="./assets/img/photo_05.jpg" id="photo_05" class="obj photo Shadow fadeInTrigger" alt=""/></a>
					<a href="assets/php/signup.php"><img src="./assets/img/photo_06.jpg" id="photo_06" class="obj photo Shadow fadeInTrigger" alt=""/></a>
				 </form>

				 <!-- SVGアニメーション -->
				 <svg id="stitch_08" class="obj stitch delayScroll">
				  <line class="line" x1="0" x2="5"   y1="0" y2="5"   fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="10"  y1="0" y2="10"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="15"  y1="0" y2="15"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="20"  y1="0" y2="20"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="25"  y1="0" y2="25"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="30"  y1="0" y2="30"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="35"  y1="0" y2="35"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="40"  y1="0" y2="40"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="45"  y1="0" y2="45"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="50"  y1="0" y2="50"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="55"  y1="0" y2="55"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="60"  y1="0" y2="60"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="65"  y1="0" y2="65"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="70"  y1="0" y2="70"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="75"  y1="0" y2="75"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="80"  y1="0" y2="80"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="85"  y1="0" y2="85"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="90"  y1="0" y2="90"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="95"  y1="0" y2="95"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="100" y1="0" y2="100" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="105" y1="0" y2="105" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="110" y1="0" y2="110" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="115" y1="0" y2="115" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="120" y1="0" y2="120" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="125" y1="0" y2="125" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="130" y1="0" y2="130" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="135" y1="0" y2="135" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="140" y1="0" y2="140" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="145" y1="0" y2="145" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="150" y1="0" y2="150" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="155" y1="0" y2="155" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="160" y1="0" y2="160" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="165" y1="0" y2="165" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="170" y1="0" y2="170" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="175" y1="0" y2="175" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="180" y1="0" y2="180" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="185" y1="0" y2="185" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="190" y1="0" y2="190" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="195" y1="0" y2="195" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="200" y1="0" y2="200" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="205" y1="0" y2="205" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="210" y1="0" y2="210" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="215" y1="0" y2="215" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="220" y1="0" y2="220" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="225" y1="0" y2="225" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="230" y1="0" y2="230" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="235" y1="0" y2="235" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="240" y1="0" y2="240" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="245" y1="0" y2="245" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="250" y1="0" y2="250" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="255" y1="0" y2="255" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="260" y1="0" y2="260" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="265" y1="0" y2="265" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="270" y1="0" y2="270" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="275" y1="0" y2="275" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="280" y1="0" y2="280" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="285" y1="0" y2="285" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="290" y1="0" y2="290" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="295" y1="0" y2="295" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="300" y1="0" y2="300" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="305" y1="0" y2="305" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="310" y1="0" y2="310" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="315" y1="0" y2="315" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="320" y1="0" y2="320" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="325" y1="0" y2="325" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="330" y1="0" y2="330" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="335" y1="0" y2="335" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="340" y1="0" y2="340" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="345" y1="0" y2="345" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="350" y1="0" y2="350" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="355" y1="0" y2="355" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="360" y1="0" y2="360" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="365" y1="0" y2="365" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="370" y1="0" y2="370" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="375" y1="0" y2="375" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="380" y1="0" y2="380" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="385" y1="0" y2="385" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="390" y1="0" y2="390" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="395" y1="0" y2="395" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="400" y1="0" y2="400" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="405" y1="0" y2="405" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="410" y1="0" y2="410" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="415" y1="0" y2="415" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="420" y1="0" y2="420" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="425" y1="0" y2="425" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="430" y1="0" y2="430" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="435" y1="0" y2="435" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="440" y1="0" y2="440" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="445" y1="0" y2="445" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="450" y1="0" y2="450" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="455" y1="0" y2="455" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="460" y1="0" y2="460" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="465" y1="0" y2="465" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="470" y1="0" y2="470" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="475" y1="0" y2="475" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="480" y1="0" y2="480" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="485" y1="0" y2="485" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="490" y1="0" y2="490" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="495" y1="0" y2="495" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="500" y1="0" y2="500" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="505" y1="0" y2="505" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="510" y1="0" y2="510" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="515" y1="0" y2="515" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="520" y1="0" y2="520" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="525" y1="0" y2="525" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="530" y1="0" y2="530" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="535" y1="0" y2="535" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="540" y1="0" y2="540" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="545" y1="0" y2="545" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="550" y1="0" y2="550" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="555" y1="0" y2="555" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="560" y1="0" y2="560" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="565" y1="0" y2="565" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line class="line" x1="0" x2="570" y1="0" y2="570" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
				 </svg>
				 <svg id="stitch_01" class="obj stitch deg45">
					<desc>Created with Snap</desc><!-- SEOテキスト -->
					<path d="M130,26 A104,104 0 0,1 130,234" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path><!-- SVGに関する視覚的情報 -->
				 </svg>
				 <svg id="stitch_02" class="obj stitch">
					<desc>Created with Snap</desc>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path class="fadeup" d="M105,21 A84,84 0 1,1 103.53399785926818,21.012793606863127" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
				 </svg>  
				 <svg id="stitch_03" class="obj stitch delayScroll">
					<desc>Created with Snap</desc>
					<line x1="480" x2="480" y1="0" y2="0"   fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="475" y1="0" y2="5"   fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="470" y1="0" y2="10"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="465" y1="0" y2="15"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="460" y1="0" y2="20"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="455" y1="0" y2="25"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="450" y1="0" y2="30"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="445" y1="0" y2="35"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="440" y1="0" y2="40"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="435" y1="0" y2="45"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="430" y1="0" y2="50"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="425" y1="0" y2="55"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="420" y1="0" y2="60"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="415" y1="0" y2="65"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="410" y1="0" y2="70"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="405" y1="0" y2="75"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="400" y1="0" y2="80"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="395" y1="0" y2="85"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="390" y1="0" y2="90"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="385" y1="0" y2="95"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="380" y1="0" y2="100" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="375" y1="0" y2="105" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="370" y1="0" y2="110" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="365" y1="0" y2="115" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="360" y1="0" y2="120" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="355" y1="0" y2="125" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="350" y1="0" y2="130" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="345" y1="0" y2="135" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="340" y1="0" y2="140" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="335" y1="0" y2="145" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="330" y1="0" y2="150" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="325" y1="0" y2="155" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="320" y1="0" y2="160" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="315" y1="0" y2="165" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="310" y1="0" y2="170" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="305" y1="0" y2="175" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="300" y1="0" y2="180" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="295" y1="0" y2="185" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="290" y1="0" y2="190" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="285" y1="0" y2="195" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="280" y1="0" y2="200" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="275" y1="0" y2="205" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="270" y1="0" y2="210" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="265" y1="0" y2="215" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="260" y1="0" y2="220" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="255" y1="0" y2="225" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="250" y1="0" y2="230" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="245" y1="0" y2="235" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="240" y1="0" y2="240" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="235" y1="0" y2="245" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="230" y1="0" y2="250" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="225" y1="0" y2="255" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="220" y1="0" y2="260" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="215" y1="0" y2="265" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="210" y1="0" y2="270" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="205" y1="0" y2="275" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="200" y1="0" y2="280" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="195" y1="0" y2="285" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="190" y1="0" y2="290" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="185" y1="0" y2="295" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="180" y1="0" y2="300" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="175" y1="0" y2="305" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="170" y1="0" y2="310" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="165" y1="0" y2="315" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="160" y1="0" y2="320" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="155" y1="0" y2="325" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="150" y1="0" y2="330" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="145" y1="0" y2="335" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="140" y1="0" y2="340" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="135" y1="0" y2="345" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="130" y1="0" y2="350" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="125" y1="0" y2="355" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="120" y1="0" y2="360" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="115" y1="0" y2="365" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="110" y1="0" y2="370" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="105" y1="0" y2="375" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="100" y1="0" y2="380" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="95"  y1="0" y2="385" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="90"  y1="0" y2="390" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="85"  y1="0" y2="395" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="80"  y1="0" y2="400" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="75"  y1="0" y2="405" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="70"  y1="0" y2="410" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="65"  y1="0" y2="415" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="60"  y1="0" y2="420" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="55"  y1="0" y2="425" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="50"  y1="0" y2="430" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="45"  y1="0" y2="435" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="40"  y1="0" y2="440" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="35"  y1="0" y2="445" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="30"  y1="0" y2="450" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="25"  y1="0" y2="455" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="20"  y1="0" y2="460" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="15"  y1="0" y2="465" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="10"  y1="0" y2="470" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="5"   y1="0" y2="475" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="480" x2="0"   y1="0" y2="480" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
				 </svg>
				 <svg id="stitch_04" class="obj stitch delayScroll">
					<desc>Created with Snap</desc>
					<line x1="0" x2="5"   y1="0" y2="5"   fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="10"  y1="0" y2="10"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="15"  y1="0" y2="15"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="20"  y1="0" y2="20"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="25"  y1="0" y2="25"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="30"  y1="0" y2="30"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="35"  y1="0" y2="35"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="40"  y1="0" y2="40"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="45"  y1="0" y2="45"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="50"  y1="0" y2="50"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="55 " y1="0" y2="55"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="60"  y1="0" y2="60"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="65"  y1="0" y2="65"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="70"  y1="0" y2="70"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="75"  y1="0" y2="75"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="80"  y1="0" y2="80"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="85"  y1="0" y2="85"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="90"  y1="0" y2="90"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="95"  y1="0" y2="95"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="100" y1="0" y2="100" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="105" y1="0" y2="105" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="110" y1="0" y2="110" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="115" y1="0" y2="115" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="120" y1="0" y2="120" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
          <line x1="0" x2="125" y1="0" y2="125" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="130" y1="0" y2="130" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="135" y1="0" y2="135" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="140" y1="0" y2="140" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="145" y1="0" y2="145" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="150" y1="0" y2="150" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="155" y1="0" y2="155" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="160" y1="0" y2="160" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="165" y1="0" y2="165" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="170" y1="0" y2="170" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="175" y1="0" y2="175" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="180" y1="0" y2="180" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="185" y1="0" y2="185" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="190" y1="0" y2="190" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="195" y1="0" y2="195" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="200" y1="0" y2="200" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="205" y1="0" y2="205" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="210" y1="0" y2="210" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="215" y1="0" y2="215" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="220" y1="0" y2="220" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="225" y1="0" y2="225" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="230" y1="0" y2="230" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="235" y1="0" y2="235" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="240" y1="0" y2="240" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="245" y1="0" y2="245" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="250" y1="0" y2="250" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="255" y1="0" y2="255" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="260" y1="0" y2="260" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="265" y1="0" y2="265" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="270" y1="0" y2="270" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="275" y1="0" y2="275" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="280" y1="0" y2="280" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="285" y1="0" y2="285" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="290" y1="0" y2="290" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="295" y1="0" y2="295" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="300" y1="0" y2="300" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="305" y1="0" y2="305" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="310" y1="0" y2="310" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="315" y1="0" y2="315" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="320" y1="0" y2="320" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="325" y1="0" y2="325" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="330" y1="0" y2="330" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="335" y1="0" y2="335" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="340" y1="0" y2="340" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="345" y1="0" y2="345" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="350" y1="0" y2="350" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="355" y1="0" y2="355" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="360" y1="0" y2="360" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="365" y1="0" y2="365" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="370" y1="0" y2="370" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="375" y1="0" y2="375" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="380" y1="0" y2="380" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="385" y1="0" y2="385" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="390" y1="0" y2="390" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="395" y1="0" y2="395" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="400" y1="0" y2="400" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
				 </svg>
				 <svg id="stitch_05" class="obj stitch deg180">
					<desc>Created with Snap</desc>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
					<path d="M125,25 A100,100 0 0,1 125,225" stroke="#000000" fill="none" style="stroke-width: 1; stroke-dasharray: 5, 5;"></path>
				 </svg>
				 <svg id="stitch_06" class="obj stitch delayScroll">
					<desc>Created with Snap</desc>
					<line x1="0" x2="0" y1="0" y2="5"   fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="15"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="25"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="35"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="45"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="55"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="65"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="75"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="85"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="95"  fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="105" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="115" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="125" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="135" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="145" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="155" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="165" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="175" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="185" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="195" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="205" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="215" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="225" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="235" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="245" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="255" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="265" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="275" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="285" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="295" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="305" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="315" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="325" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="335" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="345" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="355" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="365" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="375" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="385" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="395" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="405" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="415" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
					<line x1="0" x2="0" y1="0" y2="425" fill="none" stroke="#000000" style="stroke-width: 1; stroke-dasharray: 5, 5;"></line>
				 </svg>
				</div>				
			</div>

			<div id="third_content">
				<h2 class="gift">贈り物</h2>
					<div class="sliderArea">
						<div class="sliderWide">
							<ul class="slider">
								<li><a href="https://125naroom.com/web/2823" target="_blank"><img src="https://125naroom.com/demo/img/itukanokotonokoto01.jpg" alt="125naroom"></a></li>
								<li><a href="https://125naroom.com/web/2823" target="_blank"><img src="https://125naroom.com/demo/img/itukanokotonokoto02.jpg" alt="125naroom"></a></li>
								<li><a href="https://125naroom.com/web/2823" target="_blank"><img src="https://125naroom.com/demo/img/itukanokotonokoto03.jpg" alt="125naroom"></a></li>
								<li><a href="https://125naroom.com/web/2823" target="_blank"><img src="https://125naroom.com/demo/img/itukanokotonokoto04.jpg" alt="125naroom"></a></li>
								<li><a href="https://125naroom.com/web/2823" target="_blank"><img src="https://125naroom.com/demo/img/itukanokotonokoto05.jpg" alt="125naroom"></a></li>
							</ul>
						</div>
					</div>
				</div>
			
		</main>
		<footer></footer>

		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
		<script type="text/javascript" src="assets/js/svg.js"></script>
		<script type="text/javascript" src="assets/js/slick.min.js"></script>
		<script type="text/javascript" src="assets/js/index.js"></script>
	</body>
</html>