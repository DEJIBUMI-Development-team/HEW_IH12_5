var count = 0; // 挿入済みHTMLDOMのテンプレート総数をカウントする
var tempBtnRef = []; // ボタン要素を格納する配列

// 各ボタン要素にクリックイベントを付加
for (let index = 0; index < 3; index++) {
    tempBtnRef.push(document.getElementById("temp-" + index));
    tempBtnRef[index].addEventListener('click', insert_dom);
}

/**
 * テンプレートHTMLDOMが格納されたオブジェクトを生成するクラス
 * @param {Template_object} dom_count IDのユニーク化
 * @param {Template_object} dom_elem テンプレートはこのオブジェクト内に記述
 */

class Template_object{
    constructor(count) {
        this.dom_count = count;
        this.elem_unique = ["ft","sc", "th"];
    }
    get temp_objectDom(){
        this.dom_elem = {
            "ft_content" :  {
                "id" : `${this.elem_unique[0]}_${this.dom_count}`,
                "resize_class": `.resizer-${this.dom_count}`,
                "rotate":{
                    "rotate_id": `${this.elem_unique[0]}_rotate_${this.dom_count}`,
                    "rotate_center_id": `${this.elem_unique[0]}_rotate_center_${this.dom_count}`,
                    "rotate_content": `${this.elem_unique[0]}_rotate_content_${this.dom_count}`,
                    "rotate_top_fix": `${this.elem_unique[0]}_rotate_fix_${this.dom_count}`,
                },
                "text_id": `text_${this.dom_count}`,
                "dom" : `
                    <div class="${this.elem_unique[0]}_content context main-edit-content" id="${this.elem_unique[0]}_${this.dom_count}" data-id="${this.elem_unique[0]}_${this.dom_count}" onContextmenu="return false;">

                        <div class="rotate" id="${this.elem_unique[0]}_rotate_fix_${this.dom_count}" data-rotate="${this.elem_unique[0]}_${this.dom_count}"></div>
                    
                        <div class="rotate-center" id="${this.elem_unique[0]}_rotate_center_${this.dom_count}" data-rotate="${this.elem_unique[0]}_${this.dom_count}"></div>
                    
                        <div class="edit_svg on_h" data-id="${this.elem_unique[0]}_${this.dom_count}" id="${this.elem_unique[0]}_rotate_content_${this.dom_count}">

                            <div class="resizer-${this.dom_count} resizer resizer-tl on_n" data-id="${this.elem_unique[0]}_${this.dom_count}"></div>
                            <div class="resizer-${this.dom_count} resizer resizer-tr on_n" data-id="${this.elem_unique[0]}_${this.dom_count}"></div>
                            <div class="resizer-${this.dom_count} resizer resizer-bl on_n" data-id="${this.elem_unique[0]}_${this.dom_count}"></div>
                            <div class="resizer-${this.dom_count} resizer resizer-br on_n" data-id="${this.elem_unique[0]}_${this.dom_count}"></div>

                            <div class="rotate_fix on_n" id="${this.elem_unique[0]}_rotate_${this.dom_count}" data-rotate="${this.elem_unique[0]}_${this.dom_count}"></div>
                            <div class="fit"  data-id="${this.elem_unique[0]}_${this.dom_count}">
                                <h1 class="text" contenteditable="false" id="text_${this.dom_count}" data-id="${this.elem_unique[0]}_${this.dom_count}">見出しを追加</h1>
                            </div>
                        </div>
           
                    </div>
            `},
            "sc_content" :  {
                "id" : `${this.elem_unique[1]}_${this.dom_count}`,
                "resize_class": `.resizer-${this.dom_count}`,
                "rotate":{
                    "rotate_id": `${this.elem_unique[1]}_rotate_${this.dom_count}`,
                    "rotate_center_id": `${this.elem_unique[1]}_rotate_center_${this.dom_count}`,
                    "rotate_content": `${this.elem_unique[1]}_rotate_content_${this.dom_count}`,
                    "rotate_top_fix": `${this.elem_unique[1]}_rotate_fix_${this.dom_count}`
                },
                "text_id": `text_${this.dom_count}`,
                "dom" : `
                    <div class="${this.elem_unique[1]}_content context main-edit-content" id="${this.elem_unique[1]}_${this.dom_count}" data-id="${this.elem_unique[1]}_${this.dom_count}" onContextmenu="return false;">
                    
                        <div class="rotate" id="${this.elem_unique[1]}_rotate_fix_${this.dom_count}" data-rotate="${this.elem_unique[1]}_${this.dom_count}"></div>
                        
                        <div class="rotate-center" id="${this.elem_unique[1]}_rotate_center_${this.dom_count}" data-rotate="${this.elem_unique[1]}_${this.dom_count}"></div>
                        
                        <div data-id="${this.elem_unique[1]}_${this.dom_count}" class="edit_svg on_h" id="${this.elem_unique[1]}_rotate_content_${this.dom_count}">
                        
                        <div class="resizer-${this.dom_count} resizer resizer-tl on_n" data-id="${this.elem_unique[1]}_${this.dom_count}"></div>
                        <div class="resizer-${this.dom_count} resizer resizer-tr on_n" data-id="${this.elem_unique[1]}_${this.dom_count}"></div>
                        <div class="resizer-${this.dom_count} resizer resizer-bl on_n" data-id="${this.elem_unique[1]}_${this.dom_count}"></div>
                        <div class="resizer-${this.dom_count} resizer resizer-br on_n" data-id="${this.elem_unique[1]}_${this.dom_count}"></div>

                        <div class="rotate_fix on_n" id="${this.elem_unique[1]}_rotate_${this.dom_count}" data-rotate="${this.elem_unique[1]}_${this.dom_count}"></div>
                        <div class="fit" data-id="${this.elem_unique[1]}_${this.dom_count}">
                            <h4 class="text" contenteditable="false" id="text_${this.dom_count}" data-id="${this.elem_unique[1]}_${this.dom_count}">小見出しを追加</h4>
                        </div>

                        </div>
            
                    </div>
            `},
            "th_content" :  {
                "id" : `${this.elem_unique[2]}_${this.dom_count}`,
                "resize_class": `.resizer-${this.dom_count}`,
                "rotate":{
                    "rotate_id": `${this.elem_unique[2]}_rotate_${this.dom_count}`,
                    "rotate_center_id": `${this.elem_unique[2]}_rotate_center_${this.dom_count}`,
                    "rotate_content": `${this.elem_unique[2]}_rotate_content_${this.dom_count}`,
                    "rotate_top_fix": `${this.elem_unique[2]}_rotate_fix_${this.dom_count}`
                },
                "text_id": `text_${this.dom_count}`,
                "dom" : `
                    <div class="${this.elem_unique[2]}_content context main-edit-content" id="${this.elem_unique[2]}_${this.dom_count}" data-id="${this.elem_unique[2]}_${this.dom_count}" onContextmenu="return false;">
                    
                        <div class="rotate" id="${this.elem_unique[2]}_rotate_fix_${this.dom_count}" data-rotate="${this.elem_unique[2]}_${this.dom_count}"></div>
                        
                        <div class="rotate-center" id="${this.elem_unique[2]}_rotate_center_${this.dom_count}" data-rotate="${this.elem_unique[2]}_${this.dom_count}"></div>
                        
                        <div data-id="${this.elem_unique[2]}_${this.dom_count}" class="edit_svg on_h" id="${this.elem_unique[2]}_rotate_content_${this.dom_count}">
                        
                        <div class="resizer-${this.dom_count} resizer resizer-tl on_n" data-id="${this.elem_unique[2]}_${this.dom_count}"></div>
                        <div class="resizer-${this.dom_count} resizer resizer-tr on_n" data-id="${this.elem_unique[2]}_${this.dom_count}"></div>
                        <div class="resizer-${this.dom_count} resizer resizer-bl on_n" data-id="${this.elem_unique[2]}_${this.dom_count}"></div>
                        <div class="resizer-${this.dom_count} resizer resizer-br on_n" data-id="${this.elem_unique[2]}_${this.dom_count}"></div>

                        <div class="rotate_fix on_n" id="${this.elem_unique[2]}_rotate_${this.dom_count}" data-rotate="${this.elem_unique[2]}_${this.dom_count}"></div>
                        <div class="fit" data-id="${this.elem_unique[2]}_${this.dom_count}">
                            <p class="text" contenteditable="false" id="text_${this.dom_count}" data-id="${this.elem_unique[2]}_${this.dom_count}">本文を追加</p>
                        </div>

                        </div>
            
                    </div>
            `},
        }
        return this.dom_elem; 
    }
}

/**
 * マウスイベントの追加を行い、DOM要素を配列に格納
 * @param elem_value イベントを追加する要素のclass
 */
function addMouseEvent(elem_value, e) {
    var object_ref = temp_objects[elem_value];
    el[temp_objects[elem_value].id] = {
        "move_elem": document.getElementById(object_ref.id),
        "rotate_center": document.getElementById(object_ref.rotate.rotate_center_id),
        "rotate_top_fix_point": document.getElementById(object_ref.rotate.rotate_top_fix),
        "rotate_content": document.getElementById(object_ref.rotate.rotate_content),
        "rotate_point": document.getElementById(object_ref.rotate.rotate_id),
        "resize_point": document.querySelectorAll(object_ref.resize_class),
        "edit_text": document.getElementById(object_ref.text_id)
    };

    // add event
    el[object_ref.id].move_elem.addEventListener("mousedown", mousedown);
    el[object_ref.id].rotate_point.addEventListener('mousedown', mousedownRotate);
    // debugger;
    for (let resizer of el[object_ref.id].resize_point) {

        resizer.addEventListener("mousedown", mousedownResize);

    }
    el[object_ref.id].edit_text.addEventListener("dblclick", set_Editable);
    el[object_ref.id].edit_text.addEventListener("blur", set_Uneditable);
    // debugger;
    // var clickedDom = e.composedPath();
    // var font_p = clickedDom[0].dataset["font"]; 
    // el[object_ref.id].edit_text.textContent = font_p;

    // コンテクストメニューを表示する関数を実行
    view_context_menu()

    fitty('.fit', {
        minSize: 12,
        maxSize: 100,
    });
}

/**
 * DOMをinsertし、Mouseイベントを追加する一連の処理
 */
async function insert_dom(e) {
    try {
        // debugger;
        // resolveするまで、以下を実行しない()
        await Promise.resolve();
        
        // インスタンス生成
        temp_objects = new Template_object(count).temp_objectDom;

        // クリックされたボタン要素のvalueを取得(temp_objectsのキーとして使用)
    
        var BtnRef = e.composedPath();
        var value_content = tempBtnRef[BtnRef[0].dataset.tempid]
        var value = value_content.getAttribute('value');
        
        // DOMのinsert
        var insert = document.getElementById("data");
        insert.insertAdjacentHTML('afterbegin', temp_objects[value].dom);
        
        // insertされたDOMにドラッグイベントを付加
        addMouseEvent(value);
        fitty('.fit', {
            minSize: 12,
            maxSize: 100,
        });
        //incrementCount
        count++;
    } catch (e) {
        // 例外・error
        console.log(e.message);
    }
}

