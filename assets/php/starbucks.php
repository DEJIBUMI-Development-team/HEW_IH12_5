<?php
session_start();
$_SESSION["store"] = "starbucks";
$store = $_SESSION["store"];
$file = "../data/gift_data/gift.json";
$json_file = file_get_contents($file);
$gift_data = json_decode($json_file, true);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>でじぶみ</title>
  <link rel="stylesheet" href="../css/starbucks.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>

  <div class="background">
    <div class="water"></div>
  </div>

  <header class="navigator">
    <div class="navigator_content">
      <div class="navigator_left">
        <a href="index.html"><img src="../img/logo.png" alt="logo"></a>
        <a href="">手紙一覧</a>
        <a href="gift.html">ギフト</a>
        <a href="">マイページ</a>
      </div>

      <div class="navigator_right">
        <a href="">会員登録</a>
        <a href="">ログイン</a>
      </div>
    </div>
  </header>

  <section class="Starbucks">
    <div class="Starbucks_title">
      <a href="gift1.html"><img src="../img/Starbucks.png"></a>
      <h2>スターバックス
        <p>スターバックス！おいしいコーヒー、フラペチーノなど、手軽なギフト券をプレゼントしてみてください。</p>
      </h2>
    </div>
  </section>

  <div class="Starbucks_menu1">
    <section class="Starbucks_item">
      <form action="./shohin.php" method="post" name="shouhin_1">
        <a href="#" onclick="document.shouhin_1.submit();">
          <input type="hidden" name="product" value="america">
          <div class="item_name">
            <img src="../img/starbucks/stame.jpg">
            <div class="item_title">
              <h3><?php echo $gift_data[$store]["store_name"] ?></h3>
              <p><?php echo $gift_data[$store]["america"]["fullName"]?></p>
              <div class="item_price">￥<?php echo $gift_data[$store]["america"]["tall"]?></div>
            </div>
          </div>
        </a>
      </form>
      <form action="./shohin.php" method="post" name="shouhin_2">
        <a href="#" onclick="document.shouhin_2.submit();">
          <input type="hidden" name="product" value="starlatte">
          <div class="item_name">
            <img src="../img/starbucks/stame.jpg">
            <div class="item_title">
              <h3><?php echo $gift_data[$store]["store_name"] ?></h3>
              <p><?php echo $gift_data[$store]["starlatte"]["fullName"]?></p>
              <div class="item_price">￥<?php echo $gift_data[$store]["starlatte"]["tall"]?></div>
            </div>
          </div>
        </a>
      </form>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/stalate.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>スターバックス ラテ</p>
            <div class="item_price">￥415~￥545</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/stawitemoca.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>ホワイト モカ</p>
            <div class="item_price">￥455~￥585</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/stmoca.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>カフェ モカ</p>
            <div class="item_price">￥455~￥585</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/stkafu.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>カプチーノ</p>
            <div class="item_price">￥415~￥545</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/stkya.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>キャラメル マキアート</p>
            <div class="item_price">￥455~￥585</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/stcold.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>コールドブリュー コーヒー</p>
            <div class="item_price">￥400~￥530</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/stes.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>エスプレッソ</p>
            <div class="item_price">￥350~￥390</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/pra.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>コーヒー フラペチーノ</p>
            <div class="item_price">￥460~￥590</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/darkmoca.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>ダーク モカ チップ フラペチーノ</p>
            <div class="item_price">￥525~￥655</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/kya.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>キャラメル フラペチーノ</p>
            <div class="item_price">￥510~￥640</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/ma.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>抹茶 クリーム フラペチーノ</p>
            <div class="item_price">￥525~￥655</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/ba.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>バニラ クリーム フラペチーノ</p>
            <div class="item_price">￥510~￥640</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/mango.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>マンゴーフラペチーノ</p>
            <div class="item_price">￥510~￥640</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/gen.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>抹茶玄米茶 もち フラペチーノ</p>
            <div class="item_price">￥690</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/darkku.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>モカチップ クリーム フラペチーノ</p>
            <div class="item_price">￥525~￥655</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/ar.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>アール グレイ</p>
            <div class="item_price">￥430~￥520</div>
          </div>
        </div>
    </section>


    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/camo.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>カモミール</p>
            <div class="item_price">￥430~￥520</div>
          </div>
        </div>
    </section>


    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/ho.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>ほうじ茶</p>
            <div class="item_price">￥430~￥520</div>
          </div>
        </div>
    </section>


    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/uron.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>ゼンクラウド ウーロン</p>
            <div class="item_price">￥430~￥520</div>
          </div>
        </div>
    </section>

    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/yu.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>ユースベリー</p>
            <div class="item_price">￥430~￥520</div>
          </div>
        </div>
    </section>


    <section class="Starbucks_item">
      <a href="">
        <div class="item_name">
          <img src="../img/starbucks/cocoa.jpg">
          <div class="item_title">
            <h3>スターバックス</h3>
            <p>ココア</p>
            <div class="item_price">￥435~￥565</div>
          </div>
        </div>
    </section>
  </div>

  <!-- footer-box -->
  <footer class="footer_element">
    <div class="top_element">
      <div class="top_inner">
        <ul class="footer_menu">
          <li><a href="">利用規約</a></li>
          <li><a href=""><span>個人利用処理方針</span></a></li>
          <li><a href="">お客様センター</a></li>
          <li><a href="">意見提出</a></li>
        </ul>

        <ul class="sns">
          <li><a href=""><i class="fab fa-twitter"></i></a></li>
          <li><a href=""><i class="fab fa-facebook"></i></a></li>
          <li><a href=""><i class="fab fa-instagram"></i></a></li>
          <li><a href=""><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>

    <div class="body_element">
      <div class="body_inner">
        <p class="footer_logo"><a href=""><img src="../img/logo.png"></a></p>
        <p class="footer_info">dejibumi コールセンター 070-1234-5678 (09:00 ~ 18:00 平日)
          <br>
          Copyright © dejibumi. All Rights reserved.
        </p>
      </div>
    </div>
  </footer>