<?php
// include("../data/templateTxt_data.php");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="stylesheet" href="../data/templateTxt_data_style.css">
    <script src="../package/fitty.min.js"></script>
    <title>編集画面</title>
</head>
<body>

    <div id="contextmenu">
        <ul>
            <li id="remove">削除する</li>
        </ul>
    </div>

    <header class="content_edit_box">
        <div class="save" id="save">保存する</div>
            <div class="edit_tgl">
                <ul>
                    <li class="tgl_on" id="edit_on">編集モード</li>
                    <li id="edit_off">調整・閲覧モード</li>
                </ul>
        </div>
    </header>
    <main>
        <section class="left_m">
            <div class="select">
                <div class="select_content select_off" id="select_1">IMG</div>
                <div class="select_content" id="select_2">TEXT</div>
                <div class="select_content select_off" id="select_3"></div>
                <div class="select_content select_off" id="select_4"></div>
            </div>
            <div class="templ_m">
                <div class="template-text-1">
                    <h2>テキストをクリックして編集画面に追加</h2>
                    <label for="temp-0" class="title-text-1 template-content">
                        <h1>見出しを追加</h1>
                    </label>
                    <label for="temp-1" class="title-text-2 template-content">
                        <h4>小見出しを追加</h4>
                    </label>
                    <label for="temp-2" class="title-text-3 template-content">
                        <p>本文を追加</p>
                    </label>
                    <input type="button" value="ft_content" id="temp-0" data-tempid="0">
                    <input type="button" value="sc_content" id="temp-1" data-tempid="1">
                    <input type="button" value="th_content" id="temp-2" data-tempid="2">
                </div>
                <div class="template-text-2">
                    <h2>テンプレテキストをクリックして編集画面に追加</h2>
                    <label for="temp-0" class="text-1 template-content">
                        <p>テンプレ1はこちら</p>
                    </label>
                    <label for="temp-1" class="text-2 template-content">
                        <p>テンプレ2はこちら</p>
                    </label>
                    <label for="temp-2" class="text-3 template-content">
                        <p>テキスト3はこちら</p>
                    </label>
                </div>
            </div>
        </section>
        <!-- 編集エリア -->
        <section class="main_edit">

            <div class="edit_area">
                <div class="img_data" id="data"></div>
            </div>
        </section>
        <!-- ========= -->

    </main>
    <!-- script -->
    <script src="../data/templateTxt_data.js"></script>
    <script src="../js/edit.js"></script>
</body>
</html>