<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/create_result.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <?php include("./header.php")?>
    <div class="wrapper">
        <div class="clip-title">
            <div class="title-text">
                <h1>購入完了</h1>
                <h2>でじぶみURLが発行されました</h2>
                <h2>大切な相手に気持ちを伝えよう！！！</h2>
            </div>
        </div>
        <div class="url-clip-boad">
            <div class="text-erea">
                <p id="target-text"><?php echo "http://localhost/HEW_IH12_5/assets/php/letter.php?" . http_build_query($_GET); ?></p>
            </div>
            <button id="copy_text">Copy URL</button>
            <div class="copy-result"></div>
        </div>
    </div>

    <script>
        const copy_button = document.getElementById("copy_text");
        copy_button.addEventListener("click", copyText);
        const focus_elem = document.querySelectorAll(".text-erea");

        focus_elem.forEach((elem) => {
            elem.addEventListener("focus", () => {
                console.log("focus");
            });
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
    </script>
</body>

</html>