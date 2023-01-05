<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS */
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            /* background-image: url(../img/water_blue1.jpg); */
            background-color: rgb(248, 248, 215);
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
        }

        .text-erea {
            background-color: white;
            padding: 2px;
        }

        .text-erea p {
            font-size: 18px;
            background-color: white;
            padding-left: 4px;
            white-space: nowrap;
            /* 横幅のMAXに達しても改行しない */
            overflow: hidden;
            /* ハミ出した部分を隠す */
            text-overflow: ellipsis;
            /* 「…」と省略 */
            -webkit-text-overflow: ellipsis;
            /* Safari */
            -o-text-overflow: ellipsis;
            /* Opera */
        }

        button {
            font-size: 16px;
            background-color: green;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        .url-clip-boad {
            width: 600px;
            margin: 20% auto;
        }
    </style>
</head>

<body>
    <div class="url-clip-boad">
        <div class="text-erea">
            <p id="target-text"><?php echo "http://localhost/HEW_IH12_5/assets/php/letter.php?" . http_build_query($_GET); ?></p>
        </div>
        <button id="copy_text">Copy URL</button>
        <div class="copy-result"></div>
    </div>
    <script>
        const copy_button = document.getElementById("copy_text");
        copy_button.addEventListener("click", copyText);
        const focus_elem = document.querySelectorAll(".text-erea");

        focus_elem.forEach((elem)=>{
            elem.addEventListener("focus", ()=>{
                console.log("focus");
            })
        })
        
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