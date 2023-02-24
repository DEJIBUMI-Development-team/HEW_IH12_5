<?php
session_start();
session_regenerate_id(true);
$result = "";
if (isset($_POST['add'])) {
	$_SESSION['HS'] = 'edit'; //セッション変数に登録
	$result = "編集画面で";
	// echo $_SESSION['HS'];
	header("Location:./assets/php/signup.php");
} elseif (isset($_POST['update'])) {
	$_SESSION['HS'] = 'mypage'; //セッション変数に登録
	$result = "マイページで";
	// echo $_SESSION['MY'];
	header("Location:./assets/php/mypage.php");
} elseif (isset($_POST["gift"])) {
	$_SESSION["HS"] = "gift";
	$result = "ギフトページで";
	header("Location:./assets/php/gift.php");
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>でじぶみ</title>
	<link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/animation.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-6-2/css/9-6-2.css">
	<link rel="stylesheet" href="./assets/css/header.css">
	<link rel="stylesheet" href="./assets/css/footer.css">
	<link rel="stylesheet" href="./assets/css/reset.css">
	<link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="body_box">
	<?php include("./assets/php/header.php") ?>
	<main>
		<!-- 右下固定ボタン -->
		<div class="container">
			<p>
				<a href="./assets/img/dejibumi.mp4" id="video-open" class="video-open elm"
					style="opacity:0;">サイト説明動画</a>
			</p>
		</div>

		<!-- 背景 -->
		<div id="backgrounds">
			<div class="water1 back"></div>
		</div>

		<div id="first_view">
			<div class="blur">届けよう、その想い。</div>
			<div class="hover_text hover_tgl">
				<h3>新たな手紙のカタチ</h3>
				<h3>伝えたい想いを</h3>
				<h3>でじぶみで</h3>
			</div>
			<img class="icon" src="assets/img/logo.png" alt="">
			<div class="scrolldown1"><span>Scroll</span></div>
		</div>

		<div id="first_content">
			<h2 class="Explanation">作り方は簡単３ステップ</h2>
			<div id="Eslider">
				<p id="Ebutton-left" onclick="go_back()"></p>
				<img id="mypic" src="./assets/img/Explanation-01.png" width="400" height="300">
				<p id="Ebutton-right" onclick="go_forward()"></p>
			</div>

		</div>

		<div id="second_content" class="cf">
			<div id="top_wrapper">

				<!-- 見出しnumber -->
				<form action="index.php" method="post">

					<div class="css-speech-bubble">
						<label for="submit">
							<img src="assets/img/00.jpg" id="lnk_00" class="obj trans_bg lnk action"
								style="cursor: pointer;">
						</label>
						<input class="text" type="submit" id="submit" name="add" style="display:none">
						<p class="speech-bubble">編集画面へ</p>
					</div>

					<div class="css-speech-bubble2">
						<label for="submit1">
							<img src="assets/img/01.jpg" id="lnk_01" class="obj trans_bg lnk action"
								style="cursor: pointer;">
						</label>
						<input class="text2" type="submit" id="submit1" name="add" style="display:none">
						<p class="speech-bubble2">編集画面へ</p>
					</div>

					<div class="css-speech-bubble3">
						<label for="submit2">
							<img src="assets/img/02.jpg" id="lnk_02" class="obj trans_bg lnk action"
								style="cursor: pointer;">
						</label>
						<input class="text3" type="submit" id="submit2" name="add" style="display:none">
						<p class="speech-bubble3">編集画面へ</p>
					</div>

					<div class="css-speech-bubble4">
						<label for="submit3">
							<img src="assets/img/03.jpg" id="lnk_03" class="obj trans_bg lnk action"
								style="cursor: pointer;">
						</label>
						<input class="text4" type="submit" id="submit3" name="add" style="display:none">
						<p class="speech-bubble4">編集画面へ</p>
					</div>

				</form>

				<?php include("./assets/php/animate.php");?>


				<div id="third_content">
					<h2 class="gift">贈り物</h2>
					<div class="sliderArea">
						<div class="sliderWide">
							<form action="" method="post">
								<ul class="slider">
									<li><a href="./assets/php/gift.php" target="_blank"
											onclick="document.gift.submit();"><img src="assets/img/godiva.png"
												alt="godiva"></a></li>
									<li><a href="./assets/php/gift.php" target="_blank"
											onclick="document.gift.submit();"><img src="assets/img/saruta1.jpg"
												alt="saruta1"></a></li>
									<li><a href="./assets/php/gift.php" target="_blank"
											onclick="document.gift.submit();"><img src="assets/img/tullys.png"
												alt="tullys"></a></li>
									<li><a href="./assets/php/gift.php" target="_blank"
											onclick="document.gift.submit();"><img src="assets/img/star1.jpg"
												alt="star1"></a></li>
									<li><a href="./assets/php/gift.php" target="_blank"
											onclick="document.gift.submit();"><img src="assets/img/kome.jpg"
												alt="kome"></a></li>
								</ul>
								<input type="submit" name="gift" style="display:none">
							</form>
						</div>
					</div>
				</div>

	</main>
	<?php include("./assets/php/footer.php") ?>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
	<script type="text/javascript" src="./assets/js/svg.js"></script>
	<script type="text/javascript" src="./assets/js/slick.min.js"></script>
	<script type="text/javascript" src="./assets/js/index.js"></script>
</body>

</html>