<?php
//   opcache_reset();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="stylesheet" href="../data/templateTxt_data_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/>
    <link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" />
    <script src="../package/fitty.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
    <title>編集画面</title>

</head>
<body>
    <div id="contextmenu">
        <ul>
            <li id="remove">削除する</li>
        </ul>
    </div>

    <header class="content_edit_box">
        <div class="now-elem" id="now_elem"></div>
        <select class="fontFamilys" name="fontFamily" id="fontFamily">
            <option value="none"></option>
            <option value="Meiryo">メイリオ</option>
            <option value="serif">明朝体</option>
            <option value="sans-serif">ゴシック体</option>
            <option value="MS Pゴシック">MS Pゴシック</option>
            <option value="游ゴシック">游ゴシック</option>
            <option value="monospace">等幅フォント</option>
            <option value="fantasy">装飾的フォント</option>
            <option value="yosugara">夜すがら手書きフォント</option>
        </select>
        
        <select name="fontSize" style="display: none;">
            <option value="40">文字サイズ：小</option>
            <option value="50">文字サイズ：中</option>
            <option value="60">文字サイズ：大</option>
        </select>
        
        <select class="writtingModes" name="writingMode" id="writingMode">
            <option value="none"></option>
            <option value="unset">横</option>
            <option value="vertical-rl">縦</option>
        </select>

        <!-- ここにカラーピッカーが表示される -->
		<div class="color-picker"></div>
        <div class="edit_and_save">
            <div class="edit_tgl">
                <ul>
                    <li class="tgl_on" id="edit_on">編集モード</li>
                    <li id="edit_off">調整・閲覧モード</li>
                </ul>
            </div>
            <div class="save" id="save">保存する</div>
        </div>
    </header>
    <main>
        <section class="left_m">
            <div class="select">
                <div class="select_content select_off" id="select_img">IMG</div>
                <div class="select_content" id="select_text">TEXT</div>
                <div class="select_content select_off" id="select_elem_1"></div>
                <div class="select_content select_off" id="select_elem_2"></div>
            </div>

            <!-- 画像テンプレート部分============================== -->
            <div class="temp_t select_img main-temp-elem off_t">
                <div class="select-title">
                    <h2 class="select-img-title">画像をクリックして背景に追加</h2>
                </div>

                <div class="select-img-contents-1">
                    <div class="select-img-1 select-img-all" id="harinezumi"></div>
                    <div class="select-img-2 select-img-all" id="kingyo"></div>
                </div>
                <div class="select-img-contents-1">
                    <div class="select-img-3 select-img-all" id="sc_mimai"></div>
                    <div class="select-img-4 select-img-all" id="night"></div>
                </div>
                <div class="select-img-contents-1">
                    <div class="select-img-5 select-img-all" id=""></div>
                    <div class="select-img-6 select-img-all" id=""></div>
                </div>
                <div class="select-img-contents-1">
                    <div class="select-img-7 select-img-all" id=""></div>
                    <div class="select-img-8 select-img-all" id=""></div>
                </div>
                <div class="select-img-contents-2">
                    <div class="select-img-9 select-img-all" id=""></div>
                    <div class="select-img-10 select-img-all" id=""></div>
                </div>
            </div>
            <!-- ================================================= -->

            <!-- テキストテンプレート部分====================================== -->
            <div class="temp_m select_text main-temp-elem" id="text_template">
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
                    <input type="button" value="ft_content" id="temp-0" data-tempid="0" class="hide_box">
                    <input type="button" value="sc_content" id="temp-1" data-tempid="1" class="hide_box">
                    <input type="button" value="th_content" id="temp-2" data-tempid="2" class="hide_box">
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
            <!-- ============================================================= -->
            
            <!-- 仮置き部分==================================================== -->
            <div class="temp_e select_elem_1 main-temp-elem off_t ">
                <div class="template-text-1">
                        <h2></h2>
                        <label for="temp-0" class="title-text-1 template-content">
                            <h1></h1>
                        </label>
                        <label for="temp-1" class="title-text-2 template-content">
                            <h4></h4>
                        </label>
                        <label for="temp-2" class="title-text-3 template-content">
                            <p></p>
                        </label>
                        <!-- <input type="button" value="ft_content" id="temp-0" data-tempid="0">
                        <input type="button" value="sc_content" id="temp-1" data-tempid="1">
                        <input type="button" value="th_content" id="temp-2" data-tempid="2"> -->
                    </div>
                    <div class="template-text-2">
                        <h2></h2>
                        <label for="temp-0" class="text-1 template-content">
                            <p></p>
                        </label>
                        <label for="temp-1" class="text-2 template-content">
                            <p></p>
                        </label>
                        <label for="temp-2" class="text-3 template-content">
                            <p></p>
                        </label>
                    </div>
                </div>
            </div>
            <!-- ============================================================= -->
            
            <!-- 仮置き部分==================================================== -->
            <div class="temp_f select_elem_2 main-temp-elem off_t ">
                <div class="template-text-1">
                        <h2></h2>
                        <label for="temp-0" class="title-text-1 template-content">
                            <h1></h1>
                        </label>
                        <label for="temp-1" class="title-text-2 template-content">
                            <h4></h4>
                        </label>
                        <label for="temp-2" class="title-text-3 template-content">
                            <p></p>
                        </label>
                        <!-- <input type="button" value="ft_content" id="temp-0" data-tempid="0">
                        <input type="button" value="sc_content" id="temp-1" data-tempid="1">
                        <input type="button" value="th_content" id="temp-2" data-tempid="2"> -->
                    </div>
                    <div class="template-text-2">
                        <h2></h2>
                        <label for="temp-0" class="text-1 template-content">
                            <p></p>
                        </label>
                        <label for="temp-1" class="text-2 template-content">
                            <p></p>
                        </label>
                        <label for="temp-2" class="text-3 template-content">
                            <p></p>
                        </label>
                    </div>
                </div>
            </div>
            <!-- ============================================================= -->
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
    <script src="../js/jquery.font.js"></script>
    <!-- pickr java script -->
    <script src="../package/pickr.es5.min.js"></script>
    <script src="../package/pickr.index.js"></script>
</body>
</html>