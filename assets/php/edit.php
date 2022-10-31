<?php
include("../data/templateTxt_data.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="stylesheet" href="../data/templateTxt_data.css">
    <title>Document</title>
</head>
<body>
    <header class="content_edit_box">
        
    </header>
    <main>
        <section class="left_m">
            <div class="select">

            </div>
            <div class="templ_m">
                <form action="" method="post">
                    <select name="textSelect" id="">
                        <option value="">--Please choose an option--</option>
                        <option value="ft_content">テキストテンプレート</option>
                    </select>

                    <input type="submit" value="選択">
                </form>
            </div>
        </section>
        <section class="main_edit">
            <div class="edit_area">
                <div class="img_data">
                    <?php 
                        if (isset($_POST["textSelect"])) {
                            $postDom = $_POST["textSelect"];
                            echo $temp_object[$postDom]["dom"];
                            $_POST["textSelect"] = array();                          
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <!-- footer -->
<script src="../js/edit.js"></script>
</body>
</html>