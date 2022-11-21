var 
el = {};
let isResizing = false;
let isRotate = false;

//itemがクリックされたとき
function mousedown(e) {
    // debugger;
    //移動時にmousemove、離れた時にmouseup関数を実行する
    window.addEventListener("mousemove", mousemove);
    window.addEventListener("mouseup", mouseup);

    //現在地を取得
    let prevX = e.clientX;
    let prevY = e.clientY;

    clickedDom = e.composedPath();
    clickedId = clickedDom[0].dataset.id;
    
    // mousemoveされたとき
    function mousemove(e) {

        // リサイズが行われていない場合
        if (!isRotate && !isResizing) {
            // X,Y座標値差 = 初期値 - 現在地点 
            let newX = prevX - e.clientX;
            let newY = prevY - e.clientY;

            // 現在地点を変数として取得
            var rect = el[clickedId].move_elem.getBoundingClientRect();

            // top left位置を再設定
            el[clickedId].move_elem.style.left = rect.left - newX + "px";
            el[clickedId].move_elem.style.top = rect.top - newY + "px";

            prevX = e.clientX;
            prevY = e.clientY;

        }
    }
    
    // itemからカーソルが離れた際にイベントを解除
    function mouseup() {
        window.removeEventListener("mousemove", mousemove);
        window.removeEventListener("mouseup", mouseup);
        // calc_position();
        // fetch_domElem(Relatively_position);
    }
}
//resizeアニメーションは、以下の処理として実行を行
function mousedownResize(e) {

    clickedDom = e.composedPath();
    clickedId = clickedDom[0].dataset.id;

    // リサイズを行う際の要素(resizer)を指定
    // リサイズを許可し、draggableアニメーションの発動をさせない
    currentResizer = e.target;
    isResizing = true;

    //　クリック時のカーソル座標を取得
    let prevX = e.clientX;
    let prevY = e.clientY;

    //mousemove mouseupイベントそれぞれを指定要素に付加
    window.addEventListener("mousemove", mousemoveResize);
    window.addEventListener("mouseup", mouseupResize);

    //mousemoveイベント
    function mousemoveResize(e) {
            // 要素の相対位置を取得
            const rect = el[clickedId].move_elem.getBoundingClientRect();
            change_size = 0;
            // 指定要素に付加されているクラス名に応じて処理を変える　
            if (currentResizer.classList.contains("resizer-br")) {
                // 右下
                // 幅or高さ　-　(クリック時の座標-現在のカーソル位置) 

                el[clickedId].move_elem.style.width = rect.width - (prevX - e.clientX) + "px";
                el[clickedId].move_elem.style.height = rect.height - (prevY - e.clientY) + "px";

            } else if (currentResizer.classList.contains("resizer-bc")) {
                // 下中央 
                // 要素のheight値の変更を行わなければならない
                el[clickedId].move_elem.style.height = rect.height - (prevY - e.clientY) + "px";
            
            } else if (currentResizer.classList.contains("resizer-bl")) {
                // 左下 
                // 要素のleft値の変更を行わなければならない
                el[clickedId].move_elem.style.width = rect.width + (prevX - e.clientX) + "px";
                el[clickedId].move_elem.style.height = rect.height - (prevY - e.clientY) + "px";
                el[clickedId].move_elem.style.left = rect.left - (prevX - e.clientX) + "px";

            } else if (currentResizer.classList.contains("resizer-cl")) {
                // 左中央 
                // 要素のleft値の変更を行わなければならない
                el[clickedId].move_elem.style.width = rect.width + (prevX - e.clientX) + "px";
                el[clickedId].move_elem.style.left = rect.left - (prevX - e.clientX) + "px";

            } else if (currentResizer.classList.contains("resizer-cr")) {
                // 右中央 
                // 要素のwidth値の変更を行わなければならない
                el[clickedId].move_elem.style.width = rect.width - (prevX - e.clientX) + "px";

            } else if (currentResizer.classList.contains("resizer-tr")) {
                // 右上 
                // 要素のtop値の変更を行わなければならない
                el[clickedId].move_elem.style.width = rect.width - (prevX - e.clientX) + "px";
                el[clickedId].move_elem.style.height = rect.height + (prevY - e.clientY) + "px";
                el[clickedId].move_elem.style.top = rect.top - (prevY - e.clientY) + "px";

            } else if (currentResizer.classList.contains("resizer-tc")) {
                // 上中央 
                // 要素のheight値の変更を行わなければならない
                el[clickedId].move_elem.style.height = rect.height + (prevY - e.clientY) + "px";
                el[clickedId].move_elem.style.top = rect.top - (prevY - e.clientY) + "px";

            } else {
                // 左上
                // 要素の幅、高さ、top値、 left値すべての変更を行う
                // debugger;
                el[clickedId].move_elem.style.width = rect.width + (prevX - e.clientX) + "px";
                el[clickedId].move_elem.style.height = rect.height + (prevY - e.clientY) + "px";
                el[clickedId].move_elem.style.top = rect.top - (prevY - e.clientY) + "px";
                el[clickedId].move_elem.style.left = rect.left - (prevX - e.clientX) + "px";
                // contentTxt.style.fontSize = `${currentSize}` + "px";
            }

            // 変更後のカーソル位置をprevに退避させる
            prevX = e.clientX;
            prevY = e.clientY;
    
    }

    //ボタンが外された場合Eventを除去
    function mouseupResize() {
        window.removeEventListener("mousemove", mousemoveResize);
        window.removeEventListener("mouseup", mouseupResize);
        isResizing = false;
    }
}



function mousedownRotate(e) {
    // debugger;
    window.addEventListener("mousemove", mousemoveRotate);
    window.addEventListener("mouseup", mouseupRotate);
    isRotate = true;
    // クリックされた頂点の要素を取得し、座標としてオブジェクト形式で格納
    debugger;
    click_rotate_dom = e.composedPath();
    click_rotate_id = click_rotate_dom[0].dataset.rotate;
    var top_rect = el[click_rotate_id].rotate_top_fix_point.getBoundingClientRect();
    var center_rect = el[click_rotate_id].rotate_center.getBoundingClientRect();

    var top_position = {
        "x": top_rect.top,
        "y": top_rect.left
    };
    // 要素の中心点
    var center_position = {
        "x": center_rect.top,
        "y": center_rect.left
    };
    // 現在地点を入力
    function mousemoveRotate(e) {
            // debugger;
            // 現在地点を(e.clientY, e.clientXとして取得)
            var prev = {
                "x": e.clientY,
                "y": e.clientX
            };
            // 各辺の長さ計算を行う
            var opposite_side = Math.sqrt(((prev.x - top_position.x) ** 2) + ((prev.y - top_position.y) ** 2));
            var flanking_side_1 = Math.sqrt(((prev.x - center_position.x) ** 2) + ((prev.y - center_position.y) ** 2));
            var flanking_side_2 = Math.sqrt(((top_position.x - center_position.x) ** 2) + ((top_position.y - center_position.y) ** 2));
    
            // 余弦定理を用いてcosxを求める
            cos_x = (((flanking_side_1 ** 2) + (flanking_side_2 ** 2) - (opposite_side ** 2)) / (2 * flanking_side_1 * flanking_side_2)); 
        
            // 逆三角関数(arccos)を用いて ラジアン値を求める
            var radian = Math.acos(cos_x);
            
            // 角度に変換する
            var degree = radian * (180 / Math.PI);
            
            if (prev.y < center_position.y) {
                degree = 360 - degree;
            }
            
            if (0 < degree && degree < 10) {
                degree = 0
            }
            
            if (90 < degree && degree < 100) {
                degree = 90
            }
            
            if (180 < degree && degree < 190) {
                degree = 180
            }

            if (270 < degree && degree < 280) {
                degree = 270
            }
            el[click_rotate_id].rotate_content.style.transform = `rotate(${degree}deg)`;
            
            // 角度計算用
            // console.log(opposite_side, flanking_side_1, flanking_side_2, cos_x, radian, degree);
            // console.log(isMove, isResizing, isRotate)
            
    }
    function mouseupRotate() {
        window.removeEventListener("mousemove", mousemoveRotate);
        window.removeEventListener("mouseup", mouseupRotate);
        isRotate = false
        // calc_position();
        // get_domSytle(Relatively_position);
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
            "class": this[key].classList.value,
            "top" : (Rect.top - prRect.top) / prRect.height * 100,
            "left" : (Rect.left - prRect.left) / prRect.width * 100,
            "width" :  Rect.width / prRect.width * 100,
            "height" : Rect.height / prRect.height * 100
        };
    });
}

function get_domSytle(abs_contents) {

    fetch_object = {};
    Object.keys(abs_contents).forEach((key)=>{
        // debugger;
        var content_id = key;
        var txt = document.querySelectorAll(`#${key} text`)[0];
        var text_Dom = document.querySelectorAll(`#${key} .text`)[0];
        var angle_content =  document.querySelectorAll(`#${key} .edit_svg`)[0];

        // Style
        var angle = window.getComputedStyle(angle_content);
        var textStyle = window.getComputedStyle(text_Dom);
        
        fetch_object[key] = {
            "_id": content_id,
            "class": this.Relatively_position[key].class,
            "content_txt": txt.textContent,
            "css": {
                "width": this.Relatively_position[key].width,
                "height": this.Relatively_position[key].height,
                "top": this.Relatively_position[key].top,
                "left": this.Relatively_position[key].left,
                "text-align": textStyle.textAlign,
                "font-family": textStyle.fontFamily,
                "font-size": textStyle.fontSize,
                "transform": angle.transform
            }
        };
    });
}

function fetch_domElem(fetch_contents) {
    console.log(JSON.stringify(fetch_contents));
    // request.phpとのデータやり取りを行う処理
    fetch("../php/request.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(fetch_contents)
    })
    .then((response) => {
        if (response.ok) {
            return response.json();
        }
    })
    .then((res) => {
        console.log(res);
    })
    .catch((error) => {
        console.error("Error", error);
    });
}