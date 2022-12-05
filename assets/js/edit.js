var el = {};

// 各アニメーションの実行状態フラグ
let isResizing = false;
let isRotate = false;
let isMove = true;

// 削除対象データ格納用変数
var delete_point_dom;

// (未実装) 編集エリア中央のpx値を取得する処理
const edit_area = document.querySelector(".edit_area");
const edit_area_position = edit_area.getBoundingClientRect();
const area_center = edit_area_position.left + (edit_area_position.width / 2);

/**
 * ドラッグ移動アニメーション
 */
function mousedown(e) {

    // debugger;
    //移動時にmousemove、離れた時にmouseup関数を実行する
    window.addEventListener("mousemove", mousemove);
    window.addEventListener("mouseup", mouseup);

    //現在地を取得
    let prevX = e.clientX;
    let prevY = e.clientY;

    clickedId = get_id(e, "id");

    // mousemoveされたとき
    function mousemove(e) {

        // リサイズが行われていない場合
        if (!isRotate && !isResizing && isMove) {
            // X,Y座標値差 = 初期値 - 現在地点 
            let newX = prevX - e.clientX;
            let newY = prevY - e.clientY;

            // 現在地点を変数として取得
            var rect = el[clickedId].move_elem.getBoundingClientRect();
                        
            el[clickedId].move_elem.style.left = rect.left - newX + "px";
            el[clickedId].move_elem.style.top = rect.top - newY + "px";

            // top left位置を再設定      
            el[clickedId].move_elem.style.left = rect.left - newX + "px";
            el[clickedId].move_elem.style.top = rect.top - newY + "px";

            // console.log(newX);
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

/**
 *  resizeアニメーション
 */
function mousedownResize(e) {
    fitty('.fit', {
        minSize: 12,
        maxSize: 100,
    });

    clickedId = get_id(e, "id");

    const get_rect = el[clickedId].move_elem.getBoundingClientRect();
    const heigh_raitos = get_rect.height / get_rect.width;

    // リサイズを行う際の要素(resizer)を指定
    // リサイズを許可し、draggableアニメーションの発動をさせない
    currentResizer = e.target;
    isResizing = true;

    //　クリック時のカーソル座標を取得
    let prevX = e.clientX;

    //  mousemove mouseupイベントそれぞれを指定要素に付加
    window.addEventListener("mousemove", mousemoveResize);
    window.addEventListener("mouseup", mouseupResize);

    //  mousemoveイベント
    function mousemoveResize(e) {
        // 要素の相対位置を取得
        var rect = el[clickedId].move_elem.getBoundingClientRect();

        // console.log(rect.width, rect.height , rect.height / rect.width);

        var calc_height = (rect.width - (prevX - e.clientX)) * heigh_raitos; 

        change_size = 0;
        // 指定要素に付加されているクラス名に応じて処理を変える　
        if (currentResizer.classList.contains("resizer-br")) {
            // 右下
            // 幅or高さ　-　(クリック時の座標-現在のカーソル位置) 
            el[clickedId].move_elem.style.width = rect.width - (prevX - e.clientX) + "px";
            el[clickedId].move_elem.style.height = calc_height + "px";
        } else if (currentResizer.classList.contains("resizer-bl")) {
            // 左下 
            // 要素のleft値の変更を行わなければならない
            el[clickedId].move_elem.style.width = rect.width + (prevX - e.clientX) + "px";
            el[clickedId].move_elem.style.height = calc_height + "px";
            el[clickedId].move_elem.style.left = rect.left - (prevX - e.clientX) + "px";
        } else if (currentResizer.classList.contains("resizer-cr")) {
            // 右中央 
            // 要素のwidth値の変更を行わなければならない
            el[clickedId].move_elem.style.width = rect.width - (prevX - e.clientX) + "px";
        } else if (currentResizer.classList.contains("resizer-tr")) {
            // 右上 
            // 要素のtop値の変更を行わなければならない
            el[clickedId].move_elem.style.width = rect.width - (prevX - e.clientX) + "px";
            el[clickedId].move_elem.style.height = calc_height + "px";
            rect = el[clickedId].move_elem.getBoundingClientRect();
            el[clickedId].move_elem.style.top = rect.top - (rect.bottom - get_rect.bottom) + "px";
        } else {
            // 左上
            // 要素の幅、高さ、top値、 left値すべての変更を行う
            el[clickedId].move_elem.style.width = rect.width + (prevX - e.clientX) + "px";
            el[clickedId].move_elem.style.height = calc_height + "px";
            rect = el[clickedId].move_elem.getBoundingClientRect();
            el[clickedId].move_elem.style.top = rect.top - Math.floor(rect.bottom - get_rect.bottom) + "px";                
            el[clickedId].move_elem.style.left = rect.left - (prevX - e.clientX) + "px";
        }

        fitty('.fit', {
            minSize: 12,
            maxSize: 100,
        });

        // 変更後のカーソル位置をprevに退避させる
        prevX = e.clientX;
        prevY = e.clientY;
    }

    //ボタンが外された場合Eventを除去
    function mouseupResize() {
        el[clickedId].move_elem.style.height = "fit-content";
        window.removeEventListener("mousemove", mousemoveResize);
        window.removeEventListener("mouseup", mouseupResize);
        isResizing = false;
    }
}

/**
 * 要素の回転アニメーション
 */
function mousedownRotate(e) {
    // debugger;
    window.addEventListener("mousemove", mousemoveRotate);
    window.addEventListener("mouseup", mouseupRotate);
    isRotate = true;
    
    // クリックされた頂点の要素を取得し、座標としてオブジェクト形式で格納
    // debugger;
    click_rotate_id = get_id(e, "rotate");

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
 * 各セレクト要素を選択した場合の処理
 */
var select_on = document.querySelectorAll(".select_content");

select_on.forEach((elem)=>{
    elem.addEventListener("click", (e)=>{
        target = e.target.id;
        var on_elem = document.getElementById(target);
        on_elem.classList.remove("select_off");

        var off_main_elem = document.querySelectorAll(`.main-temp-elem:not(#${target})`);
        var off_elem = document.querySelectorAll(`.select_content:not(#${target})`);
        off_elem.forEach((off)=>{
            off.classList.add("select_off");
        });
        off_main_elem.forEach((off)=>{
            off.classList.add("off_t")
        });
        var on_main_elem = document.querySelector(`.${target}`);
        on_main_elem.classList.remove("off_t");
    });
});


/**
 * 対象のDOMを右クリックした時のコンテキストメニュー表示アニメーション
 */
function view_context_menu(){
    document.querySelector(".context").addEventListener('contextmenu',function (e){
        document.getElementById('contextmenu').style.left=e.pageX+"px";
        document.getElementById('contextmenu').style.top=e.pageY+"px";
        document.getElementById('contextmenu').style.display="block";
        
        // クリックを行った要素のIDを取得
        clicked_id = get_id(e, "id");

        // 削除対象としてデータを格納
        delete_point_dom = clicked_id;
    });
    
    document.body.addEventListener('click',function (e){
        document.getElementById('contextmenu').style.display="none";
    });
}

/**
 * 要素をダブルクリックすることでテキスト編集可能状態にする
 * @param e event 
 */
function set_Editable(e) {
    isMove = false;
    clicked_id = get_id(e, "id");
    el[clicked_id].edit_text.contentEditable = "true";
}

/**
 * フォーカスを外した際に、テキストを非編集状態にする
 * @param e event 
 */
function set_Uneditable(e) {
    isMove = true;
    clicked_id_n = get_id(e, "id");
    el[clicked_id_n].edit_text.contentEditable = "false";
}

/**
 * 指定した要素のidを取得する関数
 * @param event 指定要素のevent引数 
 * @param {string} specified_key datasetの参照キー
 * @returns 指定要素のid
 */
function get_id(event, specified_key){
    clickedDom = event.composedPath();
    return clickedDom[0].dataset[specified_key];    
}


const on_edit = document.getElementById("edit_on");
const off_edit = document.getElementById("edit_off");

// 要素を編集モードにする
on_edit.addEventListener("click", ()=>{
    off_edit.classList.remove("tgl_on");
    on_edit.classList.add("tgl_on");
    var block_elem = document.querySelectorAll(".on_n");
    var visible_elem = document.querySelectorAll(".on_h");
    block_elem.forEach((elem)=>{
        elem.style.display = "block";
    });
    visible_elem.forEach((elem)=>{
        elem.style.border = "solid 1px #000";
    });        
});

// 要素を調整・閲覧モードにする
off_edit.addEventListener("click", ()=>{
    on_edit.classList.remove("tgl_on");
    off_edit.classList.add("tgl_on");
    var none_elem = document.querySelectorAll(".on_n");
    var hidden_elem = document.querySelectorAll(".on_h");
    none_elem.forEach((elem)=>{
        elem.style.display = "none";
    });
    hidden_elem.forEach((elem)=>{
        elem.style.border = "none";
    });
});

const remove_button = document.getElementById("remove");
remove_button.addEventListener("click", remove_element)
/**
 * コンテキストから、対象のDOMを削除するボタンを押した時の処理
 */
function remove_element(){
    var remove_elem = document.getElementById(`${delete_point_dom}`);
    remove_elem.remove();
    delete el[delete_point_dom];
}

const save_btn = document.getElementById("save");
save_btn.addEventListener("click", save_elememnt);
/**
 * 保存ボタンクリック後に要素の情報を取得し、fetchする一連の処理群
 */
function save_elememnt(){
    // 絶対位置・相対位置を取得
    var position = calc_position();

    // 各要素のstyleを取得
    var elem_style = get_domSytle(position);

    // fetch
    fetch_domElem(elem_style);
}


/**
 * 動的要素の相対位置を計算し、domIDをキーとして、オブジェクトに格納する関数
 * @returns position object
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
            "height" : Rect.height / prRect.height * 100,
            "origin_top": Rect.top,
            "origin_left": Rect.left,
            "origin_width": Rect.width,
            "origin_height": Rect.height
        };
    });
    return Relatively_position;
}

/**
 * 各要素のstyleを取得する
 * @param {object} abs_contents 要素の絶対位置及び相対位置
 * @returns style object
 */
function get_domSytle(abs_contents) {

    fetch_object = {};
    Object.keys(abs_contents).forEach((key)=>{
        // debugger;
        var content_id = key;
        var txt = document.querySelectorAll(`#${key} .text`)[0];
        var text_Dom = document.querySelectorAll(`#${key} .fit`)[0];
        var angle_content =  document.querySelectorAll(`#${key} .edit_svg`)[0];

        // Style
        var angle = window.getComputedStyle(angle_content);
        var textStyle = window.getComputedStyle(text_Dom);
        
        fetch_object[key] = {
            "_id": content_id,
            "class": this.Relatively_position[key].class,
            "content_txt": txt.textContent,
            "css": {
                "or_width": this.Relatively_position[key].origin_width,
                "or_height": this.Relatively_position[key].origin_height,
                "or_top": this.Relatively_position[key].origin_top,
                "or_left": this.Relatively_position[key].origin_left,
                "re_width": this.Relatively_position[key].width,
                "re_height": this.Relatively_position[key].height,
                "re_top": this.Relatively_position[key].top,
                "re_left": this.Relatively_position[key].left,
                "text-align": textStyle.textAlign,
                "font-family": textStyle.fontFamily,
                "font-size": textStyle.fontSize,
                "transform": angle.transform
            }
        };
    });
    return fetch_object;
}

/**
 * 各要素の情報をrequest.phpにfetchする処理
 * @param {object} fetch_contents
 * fetch正常に終了した際、fetchしたオブジェクトを出力する
 */
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
        else{
            console.log("no");
        }
    })
    .then((res) => {
        console.log(res);
    })
    .catch((error) => {
        console.error("Error", error);
    });
}