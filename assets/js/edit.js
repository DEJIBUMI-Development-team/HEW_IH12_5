var 
el = [];
let isResizing = false;

//itemがクリックされたとき
function mousedown(e) {
    // debugger;
    //移動時にmousemove、離れた時にmouseup関数を実行する
    window.addEventListener("mousemove", mousemove);
    window.addEventListener("mouseup", mouseup);

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
            debugger;

            // 現在地点を変数として取得
            clickedDom = e.composedPath();
            clickedId = clickedDom[0].dataset.id;
            var rect = el[clickedId].getBoundingClientRect();

            // top left位置を再設定
            el[clickedId].style.left = rect.left - newX + "px";
            el[clickedId].style.top = rect.top - newY + "px";

            prevX = e.clientX;
            prevY = e.clientY;

        }
    }
    
    // itemからカーソルが離れた際にイベントを解除
    function mouseup() {
        window.removeEventListener("mousemove", mousemove);
        window.removeEventListener("mouseup", mouseup);
        calc_position();
        fetch_domElem();
    }
}

/**
 * 動的要素の相対位置を計算し、domIDをキーとして、オブジェクトに格納する関数
 */
function calc_position() {
    // 親要素の絶対位置をを取得
    const prDom = document.getElementById("data");
    const prRect = prDom.getBoundingClientRect();
    
    // 動的要素の繰り返し処理
    Relatively_position = {};
    Object.keys(el).forEach((key)=>{
        // 動的要素の絶対位置を取得
        var Rect =  this[key].getBoundingClientRect();
        
        // 相対位置を計算(グローバル変数にオブジェクト型で格納)
        /**
         * 相対位置計算 => {
         * "top" : ((子要素のtop - 親要素のtop) / 親要素のheight) * 100 (%)
         * "left" : ((子要素のleft - 親要素のleft) / 親要素のwidth) * 100 (%)
         * "width" : (子要素のwidth / 親要素のwidth) * 100 (%)
         * "height"  : (子要素のheight / 親要素のheight) * 100 (%)
         * }
         */ 
        Relatively_position[key] = {
            "top" : (Rect.top - prRect.top) / prRect.height * 100,
            "left" : (Rect.left - prRect.left) / prRect.width * 100,
            "width" :  Rect.width / prRect.width * 100,
            "height" : Rect.height / prRect.width * 100
        };
    });
}

function fetch_domElem() {
    // request.phpとのデータやり取りを行う処理
    fetch("../php/request.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(Relatively_position)
    })
    .then((response) => {
        if (response.ok) {
            return response.json()
        }
    })
    .then((res) =>{
        console.log(res);
    })
    .catch((error) => {
        console.error("Error", error);
    });
}