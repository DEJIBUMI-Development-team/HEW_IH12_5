// 動的要素を格納するグローバル変数
var el = {};

// forcusされた要素のIDを格納するグローバル変数
// jquery.font.jsでもこの変数を使用する
var G_current_focus = "";
var G_current_text;
var G_current_width;
var G_current_height;
var G_writing_mode;

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
        isRotate = false;
    }

}

/**
 * 各セレクト要素を選択した場合の処理
 */
var select_on = document.querySelectorAll(".select_content");

select_on.forEach((elem) => {
    elem.addEventListener("click", (e) => {
        target = e.target.id;

        var on_elem = document.getElementById(target);
        on_elem.classList.remove("select_off");

        var off_main_elem = document.querySelectorAll(`.main-temp-elem:not(#${target})`);
        var off_elem = document.querySelectorAll(`.select_content:not(#${target})`);
        off_elem.forEach((off) => {
            off.classList.add("select_off");
        });

        off_main_elem.forEach((off) => {
            off.classList.add("off_t")
        });

        var on_main_elem = document.querySelector(`.${target}`);
        on_main_elem.classList.remove("off_t");
    });
});

/**
 * 画像選択による、背景画像の差し替え
 */
const url = ["harinezumi.PNG", "kingyo.PNG", "sc_mimai.PNG", "modan.png", "xmas.PNG", "kouyou.png", "sakura.png", "oiwai.png", "oiwai_1.png", "night.PNG"];
const insert_element = document.getElementById("data");
const select_img = document.querySelectorAll(".select-img-all");
var current_url = url[0];
select_img.forEach((img, index) => {
    img.addEventListener("click", () => {
        current_url = url[index];
        insert_element.style.backgroundImage = `url(../data/img_data/${url[index]})`;
    });
});

/**
 * 対象のDOMを右クリックした時のコンテキストメニュー表示アニメーション
 */
function view_context_menu() {
    document.querySelector(".context").addEventListener('contextmenu', function (e) {
        document.getElementById('contextmenu').style.left = e.pageX + "px";
        document.getElementById('contextmenu').style.top = e.pageY + "px";
        document.getElementById('contextmenu').style.display = "block";

        // クリックを行った要素のIDを取得
        clicked_id = get_id(e, "id");

        // 削除対象としてデータを格納
        delete_point_dom = clicked_id;
    });

    document.body.addEventListener('click', function (e) {
        document.getElementById('contextmenu').style.display = "none";
    });
}

/**
 * 要素をダブルクリックすることでテキスト編集可能状態にする
 * @param e event 
 */
function set_Editable(e) {
    // ドラッグ移動イベントを実行不可の状態にする
    isMove = false;
    clicked_id = get_id(e, "id");

    // 選択した要素のIDを更新
    G_current_focus = clickedId;
    G_current_text = $(`#${G_current_focus}`).find(".text");

    // headerの各編集項目の更新を行うために対象のstyleを取得
    var current_option = G_current_text.css("fontFamily");
    var current_mode = G_current_text.css("writingMode");
    var current_color = G_current_text.css("color");

    // horizontal-tbの場合は一旦unsetに変更
    if (current_mode == "horizontal-tb") {
        current_mode = "unset";
    }

    // 各編集項目の更新
    pickr.setColor(current_color);
    $("#fontFamily").val(current_option);
    $("#writingMode").val(current_mode);
    $("#now_elem").text(G_current_text.text());

    // テキストを編集可能状態に変更
    el[clicked_id].edit_text.contentEditable = "true";
}

/**
 * フォーカスを外した際に、テキストを非編集状態にする
 * @param e event 
 */
function set_Uneditable(e) {
    // ドラッグ移動イベントを実行可能状態にする
    isMove = true;
    clicked_id_n = get_id(e, "id");

    G_current_text = $(`#${G_current_focus}`).find(".text");
    $("#now_elem").text(G_current_text.text());

    // テキストを実行不可状態に変更
    el[clicked_id_n].edit_text.contentEditable = "false";
}

/**
 * 指定した要素のidを取得する関数
 * @param event 指定要素のevent引数 
 * @param {string} specified_key datasetの参照キー
 * @returns 指定要素のid
 */
function get_id(event, specified_key) {
    clickedDom = event.composedPath();
    return clickedDom[0].dataset[specified_key];
}


const on_edit = document.getElementById("edit_on");
const off_edit = document.getElementById("edit_off");

// 要素を編集モードにする
on_edit.addEventListener("click", change_edit);

function change_edit() {
    // debugger;
    off_edit.classList.remove("tgl_on");
    on_edit.classList.add("tgl_on");
    var block_elem = document.querySelectorAll(".on_n");
    var visible_elem = document.querySelectorAll(".on_h");
    block_elem.forEach((elem) => {
        elem.style.display = "block";
    });
    visible_elem.forEach((elem) => {
        elem.style.border = "solid 1px #000";
    });
    $(".now-elem, .fontFamilys, .writtingModes").css("visibility", "visible");
    $(".color-picker").css("display", "block");
    $(".mypage, .top").css("display", "none");
}


// 要素を調整・閲覧モードにする
off_edit.addEventListener("click", change_preview);

function change_preview() {
    on_edit.classList.remove("tgl_on");
    off_edit.classList.add("tgl_on");
    var none_elem = document.querySelectorAll(".on_n");
    var hidden_elem = document.querySelectorAll(".on_h");
    none_elem.forEach((elem) => {
        elem.style.display = "none";
    });
    hidden_elem.forEach((elem) => {
        elem.style.border = "none";
    });
    $(".now-elem, .fontFamilys, .writtingModes").css("visibility", "hidden");
    $(".color-picker").css("display", "none");
    $(".mypage, .top").css("display", "block");

}

const remove_button = document.getElementById("remove");
remove_button.addEventListener("click", remove_element)
/**
 * コンテキストから、対象のDOMを削除するボタンを押した時の処理
 */
function remove_element() {
    var remove_elem = document.getElementById(`${delete_point_dom}`);
    remove_elem.remove();
    delete el[delete_point_dom];

    pickr.setColor("#000");
    $("#fontFamily").val("none");
    $("#writingMode").val("none");
    $("#now_elem").text("");

}

const save_btn = document.getElementById("save");
save_btn.addEventListener("click", save_elememnt);
/**
 * 保存ボタンクリック後に要素の情報を取得し、fetchする一連の処理群
 */
function save_elememnt() {
    var result = window.confirm('保存しますか?');

    if (result) {
        console.log("clickOk");
    }
    else {
        return;
    }

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

    // debugger;
    // const data_mergin_left = parseInt(window.getComputedStyle(prDom).marginLeft, 10);

    // 動的要素の繰り返し処理
    Relatively_position = {};
    Object.keys(el).forEach((key) => {
        // 動的要素の絶対位置を取得
        var Rect = this[key].getBoundingClientRect();

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
            "top": (Rect.top - prRect.top) / prRect.height * 100,
            "left": (Rect.left - prRect.left) / prRect.width * 100,
            "width": Rect.width / prRect.width * 100,
            "height": Rect.height / prRect.height * 100,
            "origin_top": Rect.top,
            "origin_left": Rect.left,
            "origin_width": Rect.width,
            "origin_height": Rect.height
        };
    });
    return Relatively_position;
}

var title_elem = document.querySelector(".p-title");
var title = title_elem.textContent;
title_elem.addEventListener("blur", () => {
    title_elem = document.querySelector(".p-title");
    title = title_elem.textContent;
    if (title.length == 0) {
        title_elem.textContent = "タイトルを入力してください";
    }
});
title_elem.addEventListener("focus", () => {
    title_elem = document.querySelector(".p-title");
    if (title_elem.textContent === "タイトルを入力してください") {
        title_elem.textContent = "";
        title = title_elem.textContent;
    }
});

/**
 * 各要素のstyleを取得する
 * @param {object} abs_contents 要素の絶対位置及び相対位置
 * @returns style object
 */
function get_domSytle(abs_contents) {

    fetch_object = {};
    const img_data_elem = document.getElementById("data");

    fetch_object._image = {
        "backgroud-image": current_url,
        "background-size": window.getComputedStyle(img_data_elem).backgroundSize,
    }

    if (title === "タイトルを入力してください") {
        title = "sample";
    }

    fetch_object.title = title;

    Object.keys(abs_contents).forEach((key) => {
        // debugger;
        var content_id = key;
        var txt = document.querySelectorAll(`#${key} .text`)[0];
        var text_Dom = document.querySelectorAll(`#${key} .text`)[0];
        var angle_content = document.querySelectorAll(`#${key} .edit_svg`)[0];

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
                "color": textStyle.color,
                "writingMode": textStyle.writingMode,
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
    fetch("../php/save_request.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(fetch_contents)
    })
        .then((response) => {
            if (response.ok) {
                return response.json();
            }
            else {
                console.log("no");
            }
        })
        .then((res) => {
            alert("保存しました!!");
            console.log(res);
        })
        .catch((error) => {
            alert("保存失敗");
            console.error("Error", error);
        });
}

window.onload = async function () {
    try {
        var visivle_elem = document.querySelector(".edit_area");
        var query = location.search;
        var value = query.split('=');
        if (value[1]) {
            var serch_id = decodeURIComponent(value[1]);
            const params = { method: "POST", body: JSON.stringify({ "edit_id": serch_id }) };
            const response = await fetch("./get_edit_data.php", params);
            if (response.ok) {
                var redraw_elem = await response.json();
                Object.keys(redraw_elem).forEach((key) => {
                    if (key == "_image") {
                        // console.log(key);
                        // debugger;
                        var image_path = redraw_elem[key]["backgroud-image"];
                        const first_insert = document.getElementById("data");
                        first_insert.style.backgroundImage = `url(../data/img_data/${image_path})`;
                        visivle_elem.classList.remove("hidden");
                    } else if (key == "title") {
                        var redraw_title = redraw_elem["title"];
                        if (redraw_title === "sample") {
                            redraw_title = "タイトルを入力してください"
                        }
                        title_elem = document.querySelector(".p-title");
                        title_elem.textContent = redraw_title;
                        title = redraw_title;
                    } else {
                        if (redraw_elem[key]["class"].indexOf("ft_content") >= 0) {
                            var elem_class = "ft_content";
                        } else if (redraw_elem[key]["class"].indexOf("sc_content") >= 0) {
                            var elem_class = "sc_content";
                        } else if (redraw_elem[key]["class"].indexOf("th_content") >= 0) {
                            var elem_class = "th_content";
                        }

                        // インスタンス生成
                        temp_objects = new Template_object(count).temp_objectDom;

                        // DOMのinsert
                        var insert = document.getElementById("data");
                        insert.insertAdjacentHTML('afterbegin', temp_objects[elem_class].dom);

                        // insertされたDOMにドラッグイベントを付加
                        addMouseEvent(elem_class);
                        add_style(redraw_elem[key]["content_txt"], redraw_elem[key]["css"], elem_class);
                        fitty('.fit', {
                            minSize: 12,
                            maxSize: 100,
                        });
                        //incrementCount
                        count++;
                    }

                });
            }
            else {
                console.log("no");
            }
        } else {
            visivle_elem.classList.remove("hidden");
            console.log("not save");
        }
    } catch (error) {
        console.log(error);
    }
}


function add_style(content_txt, css, elem_class) {
    $(`#${temp_objects[elem_class].text_id}`).text(content_txt);
    $(`#${temp_objects[elem_class].rotate.rotate_content}`).css("transform", css.transform);
    $(`#${temp_objects[elem_class].text_id}`).css("color", css.color);
    $(`#${temp_objects[elem_class].text_id}`).css("fontFamily", css['font-family']);
    $(`#${temp_objects[elem_class].text_id}`).css("textAlign", css["text-align"]);
    $(`#${temp_objects[elem_class].text_id}`).css("writingMode", css.writingMode);



    $(`#${temp_objects[elem_class].id}`).css("width", css.or_width);
    $(`#${temp_objects[elem_class].id}`).css("top", css.or_top);
    $(`#${temp_objects[elem_class].id}`).css("left", css.or_left);

    setTimeout(() => {
        fitty('.fit', {
            minSize: 12,
            maxSize: 100,
        });
        var visivle_elem = document.querySelector(".edit_area");
        visivle_elem.classList.remove("hidden");
    }, 200);
}

const outputBtn = document.getElementById("outputBtn");  //ボタン
const element = document.getElementById("data");  //画像化したい要素
const getImage = document.getElementById("getImage");  //ダウンロード用隠しリンク

outputBtn.addEventListener('click', async function () {

    // 各テキストを所得
    // 縦書きが存在するかの確認処理
    // writing-modeを外す
    // h2vの縦書きに変換
    // 画像変換処理
    // h2vの縦書きを外す
    // writing-modeを再設定
    // 処理完了
    try {
        var result = window.confirm("でじぶみを生成します。よろしいですか？");
        if (!result) { return; }
        var evacation_dom = [];
        var evacation_text = [];
        var reset_writing = $(".text");
        change_preview();
        await (async function () {
            await reset_writing.each(async (_, elem) => {
                if ($(elem).css("writing-mode") === "vertical-rl") {
                    // debugger;
                    var data_id = $(elem).data("id");
                    var par_elem = $(elem).parents(`#${data_id}`);
                    if ($(elem).css("font-family") === "yosugara") {
                        par_elem.css("width", par_elem.width() - 2);
                    } else if ($(elem).css("font-family") === "serif") {
                        par_elem.css("width", par_elem.width() - 21);
                    } else {
                        par_elem.css("width", par_elem.width() - 19);
                    }


                    fitty('.fit', {
                        minSize: 12,
                        maxSize: 100,
                    });

                    $(elem).css("writing-mode", "unset");
                    $(elem).css("-webkit-writing-mode", "unset");
                    $(elem).css("-ms-writing-mode", "unset");

                    evacation_text.push($(elem).text());
                    evacation_dom.push($(elem));
                    $(elem).text(" " + $(elem).text());
                    console.log("b");
                }
            });
        })();


        if (evacation_dom.length != 0) {
            evacation_dom.forEach((elem) => {
                var text = elem[0].textContent;
                elem.tategaki(text.length);
            });
        }


        setTimeout(() => {
            html2canvas(element, {
                backgroundColor: null
            }).then((canvas) => {
                if (title === "タイトルを入力してください") {
                    title = "sample";
                }
                getImage.setAttribute("href", canvas.toDataURL());
                getImage.setAttribute("download", `${title}.png`);
                getImage.click();

            });
        }, 10);


        setTimeout(() => {
            evacation_dom.forEach((elem, index) => {
                console.log(4);
                $(elem).css("writing-mode", "vertical-rl");
                $(elem).css("-webkit-writing-mode", "vertical-rl");
                $(elem).css("-ms-writing-mode", "vertical-rl");

                elem.empty();
                elem.text(evacation_text[index]);

                var data_id = $(elem).data("id");
                var par_elem = $(elem).parents(`#${data_id}`);

                if ($(elem).css("font-family") === "yosugara") {
                    par_elem.css("width", par_elem.width() + 2);
                } else if ($(elem).css("font-family") === "serif") {
                    par_elem.css("width", par_elem.width() + 21);
                } else {
                    par_elem.css("width", par_elem.width() + 19);
                }

                fitty('.fit', {
                    minSize: 12,
                    maxSize: 100,
                });
            });
        }, 1000);

    } catch (error) {
        console.log(error)
    }
});

const to_create_letter = document.getElementById("to_create_letter");
to_create_letter.addEventListener("click", ()=>{
    window.open("../php/create_letter.php", "_blank");
});
const to_mypage = document.querySelector(".mypage");
to_mypage.addEventListener("click", ()=>{
    var result = window.confirm("マイページに移動します。よろしいですか？");
    if (!result) { return; }
    window.open("../php/mypage.php");
});
const to_toppage = document.querySelector(".top");
to_toppage.addEventListener("click", ()=>{
    var result = window.confirm("TOPページに移動します。よろしいですか？");
    if (!result) { return; }
    window.open("../../index.php");
});
