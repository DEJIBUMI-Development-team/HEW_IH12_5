<?php
// セッション開始
session_start();

// 仮置き
// $_SESSION['HS'] = "edit";
// echo $_SESSION["HS"];


include("./ChromePhp.php");
require_once("./db.php");
// エラーメッセージの初期化
$errorMessage = "";
$msg = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["userName"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザー名が未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    if (!empty($_POST["userName"]) && !empty($_POST["password"])) {
        // 入力したユーザIDとPWを格納
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        //クエリをdb.php上のfunction db()に引き渡す
        $row = db("SELECT F_user_id, user_name, password FROM t_user WHERE user_name = '{$userName}'");

        //階層を一段階浅くする
        $merge_row = call_user_func_array("array_merge", $row);
        //結果情報表示ログ
        ChromePhp::log($merge_row);

        //ユーザ―判定
        if ($userName == $merge_row["user_name"]) {
            // パスワード判定
            if (password_verify($password,  $merge_row["password"])) {
                $_SESSION["user_id"] = $merge_row["F_user_id"];
                $_SESSION["user_name"] = $merge_row["user_name"];
                if ($_SESSION['HS'] == "edit") {
                    $result = "編集画面で";
                    header("Location:./edit.php");
                }elseif ($_SESSION['HS'] == "mypage") {
                    $result = "マイページで";
                    header("Location:./mypage.php");
                }elseif ($_SESSION['HS'] == "gift") {
                    $result = "ギフトページで";
                    header("Location:./gift.php");
                }else {
                    header("Location./mypage.php");   
                }

            } else {
                $errorMessage = "ユーザ―名または、パスワードに誤りがあります";
            }
        } else {
            $errorMessage = "ユーザ―名または、パスワードに誤りがあります!";
        }
    }
}

?>

<!doctype html>
<html>

<head>
    <meta name="robots" content="none.noindex">
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="../css/login.css?v=2" type='text/css'>
    <link rel="shortcut icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="../css/login.css">
    <meta name="robots" content="none,noindex,nofollow">
</head>

<body class="Login_body">
    <main>
        <div id="backgrounds">
            <div class="water1"></div>
        </div>

        <div id="first_view">
            <img class="icon" src="../img/logo.png" alt="">
        </div>

        <div class="Login_form">
            <form id="loginForm" name="loginForm" action="" method="POST">
                <div class="user_info">
                    <p class="Login_NM">ユーザー名</p>
                    <div class="error">
                        <font color="#ff0000">
                            <?php print htmlspecialchars($errorMessage, ENT_QUOTES); ?>
                        </font>
                    </div>
                </div>
                <label for="userName"></label><input class="User" type="text" id="userName" name="userName" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["userName"])) {
                                                                                                                                                echo htmlspecialchars($_POST["userName"], ENT_QUOTES);
                                                                                                                                            } ?>">

                <p class="Login_PW">パスワード</p>
                <label for="password"></label>
                <input class="User" type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <input type="hidden" name="ticket" value="<?php print $ticket ?>">
                <br>
                <div class="Login_ticket">
                    <input type="submit" class="Login_submit" id="login" name="login" value="ログイン">
                </div>
            </form>

            <div class="action">
                <!-- <a href="./SingnUp.php" class="SingnUp">会員登録はこちらから</a> -->
                <a href="../../index.php" class="Top">トップへ戻る</a>
            </div>
        </div>
    </main>
    <script>
        window.onload = async function() {
            try {
                var visivle_elem = document.querySelector(".edit_area");
                var query = location.search;
                var value = query.split('=');
                if (value[1]) {
                    var serch_id = decodeURIComponent(value[1]);
                    const params = {
                        method: "POST",
                        body: JSON.stringify({
                            "edit_id": serch_id
                        })
                    };
                    const response = await fetch("./get_edit_data.php", params);
                    if (response.ok) {
                        var redraw_elem = await response.json();
                        Object.keys(redraw_elem).forEach((key) => {
                            if (key == "_image") {
                                // console.log(key);
                                // debugger;
                                var image_path = redraw_elem[key]["backgroud-image"];
                                const first_insert = document.getElementById("data");
                                first_insert.style.backgroundImage = `url(../data/img_data/${image_path})`;
                            } else {
                                if (redraw_elem[key]["class"].indexOf("ft_content") >= 0) {
                                    var elem_class = "ft_content";
                                } else if (redraw_elem[key]["class"].indexOf("sc_content") >= 0) {
                                    var elem_class = "sc_content";
                                } else if (redraw_elem[key]["class"].indexOf("th_content") >= 0) {
                                    var elem_class = "th_content";
                                }

                                // インスタンス生成
                                temp_objects = new Template_object(count).temp_objectDom;

                                // DOMのinsert
                                var insert = document.getElementById("data");
                                insert.insertAdjacentHTML('afterbegin', temp_objects[elem_class].dom);

                                // insertされたDOMにドラッグイベントを付加
                                addMouseEvent(elem_class);
                                add_style(redraw_elem[key]["content_txt"], redraw_elem[key]["css"], elem_class);
                                fitty('.fit', {
                                    minSize: 12,
                                    maxSize: 100,
                                });

                                //incrementCount
                                count++;
                            }

                        });
                    } else {
                        console.log("no");
                    }
                } else {
                    visivle_elem.classList.remove("hidden");
                    console.log("not save");
                }
            } catch (error) {
                console.log(error);
            }
        }
    </script>
</body>

</html>
<!-- HTML !-->