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

            </div>
        </section>
        <section class="main_edit">
            <div class="edit_area">
                <div class="img_data">
                    <?php print $temp_object["ft_content"]["dom"];?>
                </div>
            </div>
        </section>
    </main>

    <!-- footer -->
<script src="../js/edit.js"></script>
</body>
</html>