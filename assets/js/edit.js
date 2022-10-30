const el = document.querySelector(".ft_content");
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

