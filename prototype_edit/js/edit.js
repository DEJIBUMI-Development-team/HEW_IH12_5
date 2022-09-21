const el = document.querySelector(".item");
const contentTxt = document.querySelector(".content_p");
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

const resizers = document.querySelectorAll(".resizer");
let currentResizer;

for (let resizer of resizers) {
    // 各resizerに対し、mousedownイベントを付加
    resizer.addEventListener("mousedown", mousedown);
    debugger;

    function mousedown(e) {
        // リサイズを行う際の要素(resizer)を指定
        // リサイズを許可し、draggableアニメーションの発動をさせない
        currentResizer = e.target;
        isResizing = true;

        //　クリック時のカーソル座標を取得
        let prevX = e.clientX;
        let prevY = e.clientY;

        //mousemove mouseupイベントそれぞれを指定要素に付加
        window.addEventListener("mousemove", mousemove);
        window.addEventListener("mouseup", mouseup);

        //mousemoveイベント
        function mousemove(e) {
            // 要素の相対位置を取得
            const rect = el.getBoundingClientRect();
            change_size = 0;
            // 指定要素に付加されているクラス名に応じて処理を変える　
            if (currentResizer.classList.contains("resizer-br")) {
                // 右下
                // 幅or高さ　-　(クリック時の座標-現在のカーソル位置) 
                el.style.width = rect.width - (prevX - e.clientX) + "px";
                el.style.height = rect.height - (prevY - e.clientY) + "px";

            } else if (currentResizer.classList.contains("resizer-bl")) {
                // 左下 
                // 要素のleft値の変更を行わなければならない
                el.style.width = rect.width + (prevX - e.clientX) + "px";
                el.style.height = rect.height - (prevY - e.clientY) + "px";
                el.style.left = rect.left - (prevX - e.clientX) + "px";

            } else if (currentResizer.classList.contains("resizer-tr")) {
                // 右上 
                // 要素のtop値の変更を行わなければならない
                el.style.width = rect.width - (prevX - e.clientX) + "px";
                el.style.height = rect.height + (prevY - e.clientY) + "px";
                el.style.top = rect.top - (prevY - e.clientY) + "px";
            } else {
                // 左上
                // 要素の幅、高さ、top値、 left値すべての変更を行う
                // debugger;
                // let currentSize = window.getComputedStyle(contentTxt).fontSize;  
                // currentSize = parseInt(currentSize);          
                // if (prevX - e.clientX > 0) {
                //     currentSize += 0.3;
                // }else{
                //     currentSize -= 0.3;
                // }
                el.style.width = rect.width + (prevX - e.clientX) + "px";
                el.style.height = rect.height + (prevY - e.clientY) + "px";
                el.style.top = rect.top - (prevY - e.clientY) + "px";
                el.style.left = rect.left - (prevX - e.clientX) + "px";
                // contentTxt.style.fontSize = `${currentSize}` + "px";
            }
            debugger;
            // resize();
            // 変更後のカーソル位置をprevに退避させる
            prevX = e.clientX;
            prevY = e.clientY;
        }

        //ボタンが外された場合Eventを除去
        function mouseup() {
            window.removeEventListener("mousemove", mousemove);
            window.removeEventListener("mouseup", mouseup);
            isResizing = false;
        }
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


