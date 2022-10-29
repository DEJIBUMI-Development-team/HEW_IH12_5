const el = document.querySelector(".contentbox");
// const contentTxt = document.querySelector(".content_p");
let isResizing = false;

el.addEventListener("mousedown", mousedown);

//itemがクリックされたとき
function mousedown(e) {
    //移動時にmousemove、離れた時にmouseup関数を実行する
    window.addEventListener("mousemove", mousemove);
    window.addEventListener("mouseup", mouseup);
    // debugger;

    //現在地を取得
    let prevX = e.clientX;
    let prevY = e.clientY;

    
    // mousemoveされたとき
    function mousemove(e) {

        // リサイズが行われていない場合
        if (!isResizing) {
            // X,Y座標値差 = 初期値 - 現在地点 
            let newX = prevX - e.clientX;
            let newY = prevY - e.clientY;

            // 現在地点を定数として取得
            const rect = el.getBoundingClientRect();


            // top left位置を再設定
            el.style.left = rect.left - newX + "px";
            el.style.top = rect.top - newY + "px";

            // カーソル位置を再取得
            prevX = e.clientX;
            prevY = e.clientY;
            // console.log("X:"+prevX+" Y:"+prevY);
        }
    }
    
    // itemからカーソルが離れた際にイベントを解除
    function mouseup() {
        window.removeEventListener("mousemove", mousemove);
        window.removeEventListener("mouseup", mouseup);
    }
}

// function resize() {
//     /* 文字数が少なくなったときのため、フォントサイズを戻せるようにします。
//     他にstyleの属性があればfont-sizeに関するところを除いてstyleに上書きしましょう。
//     今回はないのでstyle属性ごと削除します。*/
//     contentTxt.removeAttribute('style');
//     console.log(contentTxt.getBoundingClientRect().height , contentTxt.scrollHeight);
//     for (
//         let size = 30;
//         contentTxt.getBoundingClientRect().height　< contentTxt.scrollHeight && size > 10;
//         size -= 3
//         /* 文字がはみ出すサイズが存在していたので、1ずつ減らすのを3ずつ減らすという少し速いペースでフォントサイズを小さくしてみました。
//         こちらには正解不正解はなく、場合によって調整して遊んでみてください。*/
//     ) {
//         contentTxt.style.fontSize = size + "px";
//         // textElem.setAttribute("style", `font-size: ${size}px`); // こちらも可能
//     }
// }


