<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入完了</title>
    <link rel="stylesheet" href="../css/create_result.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <?php include("./header.php") ?>
    <div class="wrapper">
        <div class="clip-title">
            <div class="title-text">
                <h1>購入完了</h1>
                <h2>でじぶみURLが発行されました</h2>
                <h2>大切な相手に気持ちを伝えよう！！！</h2>
                <p style="color: red">※ページ遷移する前に、必ずPCに下記URLを保存してください。</h3>
                <p style="color: red">※URLの有効期限は3か月です。</p>
            </div>
        </div>
        <div class="url-clip-boad">
            <div class="text-erea">
                <p id="target-text"><?php echo "http://localhost/HEW_IH12_5/assets/php/letter.php?" . http_build_query($_GET); ?></p>
            </div>
            <button id="copy_text">Copy URL</button>
            <div class="copy-result"></div>
        </div>

        <?php
        if (!empty($_SESSION["store_name"])) {
            $gift_data = [
                "gift_name" => $_SESSION["product_name"],
                "store_name" => $_SESSION["store_name"],
                "count"=> $_SESSION["gift_count"]
            ];
            $url =  "http://localhost/HEW_IH12_5/assets/php/letter.php?".http_build_query($_GET)."&".http_build_query($gift_data);

            echo <<<EOD

                <div class="url-clip-boad_g">
                    <div>GIFT付URLは下記のリンクをクリック</div>
                    <div class="text-erea_g">
                        <p id="target-text_g">
                            {$url}
                        </p>
                    </div>
                    <button id="copy_text_g">Copy URL</button>
                    <div class="copy-result_g"></div>
                </div>
            EOD;

            unset($_SESSION["product_name"]);
            unset($_SESSION["store_name"]);
            unset($_SESSION["gift_count"]);

        }

        ?>
    </div>

    <script>
        const copy_button = document.getElementById("copy_text");
        copy_button.addEventListener("click", copyText);
        const focus_elem = document.querySelectorAll(".text-erea");
        
        const copy_button_g = document.getElementById("copy_text_g");
        if (copy_button_g) {
            copy_button_g.addEventListener("click", copyText_g);
        }

        const focus_elem_g = document.querySelectorAll(".text-erea_g");

        const target_text = document.getElementById("target-text");
        target_text.addEventListener("click",()=>{
            target_text.style.whiteSpace = "normal";
            target_text.style.textOverflow = "unset";
            target_text.style.overflow = "unset";
            target_text.style.wordBreak = "break-all";
        });

        
        const target_text_g = document.getElementById("target-text_g");
        target_text_g.addEventListener("click",()=>{
            target_text_g.style.whiteSpace = "normal";
            target_text_g.style.textOverflow = "unset";
            target_text_g.style.overflow = "unset";
            target_text_g.style.wordBreak = "break-all";
        });


        function copyText() {
            // Select the text
            var elem = document.querySelector(".copy-result");
            var text = document.querySelector('#target-text');
            var range = document.createRange();
            range.selectNode(text);
            window.getSelection().addRange(range);
            // Copy the text
            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
                elem.textContent = `copy : ${msg}`;
            } catch (err) {
                elem.textContent = msg;
                console.log('Oops, unable to copy');
            }
            // Remove the selected text
            window.getSelection().removeAllRanges();
        }

        function copyText_g() {
            // Select the text
            var elem = document.querySelector(".copy-result_g");
            var text = document.querySelector('#target-text_g');
            var range = document.createRange();
            range.selectNode(text);
            window.getSelection().addRange(range);
            // Copy the text
            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
                elem.textContent = `copy : ${msg}`;
            } catch (err) {
                elem.textContent = msg;
                console.log('Oops, unable to copy');
            }
            // Remove the selected text
            window.getSelection().removeAllRanges();
        }
    </script>
</body>

</html>