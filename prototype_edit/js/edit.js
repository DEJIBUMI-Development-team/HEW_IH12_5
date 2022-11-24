const el = document.querySelector(".item");
const contentTxt = document.querySelector(".content_p");
let isResizing = false;
let isRotate = false
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
        if (!isResizing && !isRotate) {
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
        isMove = false
    }
}

const resizers = document.querySelectorAll(".resizer");
let currentResizer;

for (let resizer of resizers) {
    // 各resizerに対し、mousedownイベントを付加
    resizer.addEventListener("mousedown", mousedown);
    // debugger;

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

                } else if (currentResizer.classList.contains("resizer-bc")) {
                    // 下中央 
                    // 要素のheight値の変更を行わなければならない
                    el.style.height = rect.height - (prevY - e.clientY) + "px";
                
                } else if (currentResizer.classList.contains("resizer-bl")) {
                    // 左下 
                    // 要素のleft値の変更を行わなければならない
                    el.style.width = rect.width + (prevX - e.clientX) + "px";
                    el.style.height = rect.height - (prevY - e.clientY) + "px";
                    el.style.left = rect.left - (prevX - e.clientX) + "px";

                } else if (currentResizer.classList.contains("resizer-cl")) {
                    // 左中央 
                    // 要素のleft値の変更を行わなければならない
                    el.style.width = rect.width + (prevX - e.clientX) + "px";
                    el.style.left = rect.left - (prevX - e.clientX) + "px";

                } else if (currentResizer.classList.contains("resizer-cr")) {
                    // 右中央 
                    // 要素のwidth値の変更を行わなければならない
                    el.style.width = rect.width - (prevX - e.clientX) + "px";

                } else if (currentResizer.classList.contains("resizer-tr")) {
                    // 右上 
                    // 要素のtop値の変更を行わなければならない
                    el.style.width = rect.width - (prevX - e.clientX) + "px";
                    el.style.height = rect.height + (prevY - e.clientY) + "px";
                    el.style.top = rect.top - (prevY - e.clientY) + "px";

                } else if (currentResizer.classList.contains("resizer-tc")) {
                    // 上中央 
                    // 要素のheight値の変更を行わなければならない
                    el.style.height = rect.height + (prevY - e.clientY) + "px";
                    el.style.top = rect.top - (prevY - e.clientY) + "px";

                } else {
                    // 左上
                    // 要素の幅、高さ、top値、 left値すべての変更を行う
                    // debugger;
                    el.style.width = rect.width + (prevX - e.clientX) + "px";
                    el.style.height = rect.height + (prevY - e.clientY) + "px";
                    el.style.top = rect.top - (prevY - e.clientY) + "px";
                    el.style.left = rect.left - (prevX - e.clientX) + "px";
                    // contentTxt.style.fontSize = `${currentSize}` + "px";
                }

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

const center = document.querySelector(".rotate-center");
const Top_fix_Point = document.querySelector(".rotate");
const rotate_content = document.querySelector(".border");

Top_fix_Point.addEventListener('mousedown', mousedownRotate);

function mousedownRotate() {
    // debugger;
    window.addEventListener("mousemove", mousemoveRotate);
    window.addEventListener("mouseup", mouseupRotate);
    isRotate = true;
    // クリックされた頂点の要素を取得し、座標としてオブジェクト形式で格納
    var Top_rect = Top_fix_Point.getBoundingClientRect();
    var center_rect = center.getBoundingClientRect();

    var Top_position = {
        "x": Top_rect.top,
        "y": Top_rect.left
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
            var opposite_side = Math.sqrt(((prev.x - Top_position.x) ** 2) + ((prev.y - Top_position.y) ** 2));
            var flanking_side_1 = Math.sqrt(((prev.x - center_position.x) ** 2) + ((prev.y - center_position.y) ** 2));
            var flanking_side_2 = Math.sqrt(((Top_position.x - center_position.x) ** 2) + ((Top_position.y - center_position.y) ** 2));
    
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
            rotate_content.style.transform = `rotate(${degree}deg)`;
    
            console.log(opposite_side, flanking_side_1, flanking_side_2, cos_x, radian, degree);
            console.log(isMove, isResizing, isRotate)
            
    }
    function mouseupRotate() {
        window.removeEventListener("mousemove", mousemoveRotate);
        window.removeEventListener("mouseup", mouseupRotate);
        isRotate = false
    }

}

const focus_item = document.getElementById("focus");
const visible_content = document.querySelectorAll(".on_focus");
const block_content = document.querySelectorAll(".on_focus_button");
debugger;
focus_item.addEventListener(`focus`, () => {
    debugger
    block_content.forEach((element, index) => {
        element.style.display = "block";
    });
    visible_content.forEach((element, index) => {
        element.style.visibility = "visible";
    });
})

focus_item.addEventListener(`blur`, () => {
    debugger

    if (!isResizing && !isRotate) {
        block_content.forEach((element, index) => {
            element.style.display = "none";
        });
        visible_content.forEach((element, index) => {
            element.style.visibility = "hidden";
        });
    }
})