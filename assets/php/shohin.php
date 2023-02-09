
<?php
session_start();
$store = $_SESSION["store"];
$product_name = $_POST["product"];
$file = "../data/gift_data/gift.json";
$json_file = file_get_contents($file);
$gift_data = json_decode($json_file, true);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>でじぶみ</title>
  <link rel="stylesheet" href="../css/shohin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
</head>

<body>

  <div class="background">
    <div class="water"></div>
  </div>

  <?php include("./header.php") ?>

  <!-- map-box -->
  <div class="map_wrap">
    <div class="map_inner">
      <div class="map_channer">
        <ul class="map_list">
          <li><a href="gift.html">ギフト</a></li>
          <li class="line"><a href="starbucks.php"><?php echo $gift_data[$store]["store_name"]?></a></li>
          <li class="line"><p><?php echo $gift_data[$store][$product_name]["fullName"]?></p></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- itme-box -->
  <div class="item_wrap">
    <div class="item_meta">
      <div class="item_img-container">
        <div class="item_img-viewer">
          <img src="../img/<?php echo $gift_data[$store][$product_name]["url"]?>">
        </div>
      </div>
      <div class="item_text">
        <div class="item_info">
          <div class="sg-item-type">
            モバイルギフト
          </div>
          <h2 class="item_name"><?php echo $gift_data[$store][$product_name]["fullName"]?></h2>
          <p class="item_subname"><?php echo $gift_data[$store][$product_name]["subTitle"]?></p>
          <div class="item_price">
            <p>￥<?php echo $gift_data[$store][$product_name]["tall"]?></p>
          </div>
          <div class="item_note">
            <p>• 有効期限は購入日から1年後に満了します。</p>
            <p>• プレゼント方法: リンク共有 / ライン(SNS)</p>
          </div>
          <div class="item_actions-container">
            <p>※ 最大5個までプレゼントできます。</p>

            <form action="./create_letter.php" method="post">
              <div class="item_actions">
                <button type="button">Tall</button>
                <input type="hidden" name="size" value="tall">
              </div>
              <div class="sg-counter">
                <select name="count" class="item_select">
                  <option value="">数量を選択</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <label for="item" class="item_but">プレゼント</label>
                <input type="hidden" name="store" value=<?php echo "{$store}"; ?>>
                <input type="hidden" name="product_name" value=<?php echo "{$product_name}"; ?>>
                <input type="submit" value="submit" id="item" style="display: none;">
              </div>
            </form>
            <hr>
            <div class="item_brand-store">
              <a href="starbucks.html"><img src="../img/Starbucks.png">
                <p>スターバックス</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="item_info_under">
      <ul class="tabs">
        <li class="tab-link current" data-tab="tab-1">商品詳細</li>
        <li class="tab-link" data-tab="tab-2">払い戻し&注意事項</li>
      </ul>

      <div id="tab-1" class="tab-content current">
        <p>• 有効期限は購入日から1年後に満了します。</p>
        <br>
        <p>有効期間内に使用できます。</p>

        <p>- 写真画像は例であり、実際とは異なる場合があります。</p>

        <p>- 本商品は店舗在庫状況によって同一商品への交換が不可能な場合があります。</p>

        <P>- 同一商品の交換が不可能な場合、同一価格以上の他の商品に交換が可能で、差額は追加で支払わなければなりません。</P>

        <p>- ポイントの積み立てや提携カードの割引などは、交換先のポリシーに従います。</p>

        <p>- 該当クーポンとスターバックスカードの複合決済取引は、スターバックスカード固有の特典であるFree Extraおよび別積立金は適用対象ではない点、ご利用の際に参考にしてください。</p>

        <br>
        <P>【使用場所】</P>

        <P>スターバックス全店舗</P>
      </div>
      <div id="tab-2" class="tab-content">
        <span>•[有効期間延長政策]</span>
        <br>
        <P>1.有効期間の延長は未使用の引換券に限り有効期間満了日の1日前まで申請可能です。</P>

        <p>2.有効期間は93日単位で延長可能ですが、これは最初の発行日から最大5年まで可能です。</p>

        <p>3.有効期間の延長申請はinumberお客様センター(070-1234-5678)までお電話ください。 (祝日を除く平日午前9:00時~午後6:00時)</p>
        <br>
        <span>•[キャンセル及び払い戻しポリシー]</span>
        <br>
        <p>1.初回満了日前:使用された引換券はキャンセル及び払い戻しができず、未使用引換券に対する決済のキャンセル及び払い戻しは購入者がDEjibumiカスタマーセンター(support@dejibumi.com)に申請可能です。</p>

        <p>2.最初の満了日後:受け取った方がDEjibumiお客様センター(070-1234-5678)までお電話いただくと申し込み可能で、購入金額の90%金額が払い戻しされます。</p>

        <p>3. 有効期間が満了した引換券の払い戻し申請は、最初の発行日から5年以内まで可能です。</p>
      </div>
    </div>
  </div>

  <!-- footer-box -->
  <?php include("./footer.php") ?>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="../js/tab.js"></script>
</body>

</html>