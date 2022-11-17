var count = 0; // 挿入済みHTMLDOMのテンプレート総数をカウントする
var tempBtnRef = []; // ボタン要素を格納する配列

// 各ボタン要素にクリックイベントを付加
for (let index = 0; index < 2; index++) {
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
        this.elem_unique = ["ft","sc"];
    }
    get temp_objectDom(){
        this.dom_elem = {
            "ft_content" :  {
                "id" : `${this.elem_unique[0]}_${this.dom_count}`,
                "rotate":{
                    "rotate_id": `${this.elem_unique[0]}_rotate_${this.dom_count}`,
                    "rotate_center_id": `${this.elem_unique[0]}_rotate_center_${this.dom_count}`,
                    "rotate_content": `${this.elem_unique[0]}_rotate_content_${this.dom_count}`
                },
                "dom" : `
                    <div class="${this.elem_unique[0]}_content" id="${this.elem_unique[0]}_${this.dom_count}" data-id="${this.elem_unique[0]}_${this.dom_count}">
                        <div class="rotate" id="${this.elem_unique[0]}_rotate_${this.dom_count}" data-rotate="${this.elem_unique[0]}_${this.dom_count}"></div>
                        <div class="rotate-center" id="${this.elem_unique[0]}_rotate_center_${this.dom_count}" data-rotate="${this.elem_unique[0]}_${this.dom_count}"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" data-id="${this.elem_unique[0]}_${this.dom_count}" class="edit_svg" id="${this.elem_unique[0]}_rotate_content_${this.dom_count}">
                            <foreignObject width="100%" height="100%" x="0" y="0"  data-id="${this.elem_unique[0]}_${this.dom_count}">
                                <div xmlns="http://www.w3.org/1999/xhtml" contenteditable="true" class="text"  data-id="${this.elem_unique[0]}_${this.dom_count}">
                                    <text data-id="${this.elem_unique[0]}_${this.dom_count}">テキスト1</text>
                                </div>
                            </foreignObject>
                        </svg>                  
                    </div>
            `},
            "sc_content" :  {
                "id" : `${this.elem_unique[1]}_${this.dom_count}`,
                "rotate":{
                    "rotate_id": `${this.elem_unique[1]}_rotate_${this.dom_count}`,
                    "rotate_center_id": `${this.elem_unique[1]}_rotate_center_${this.dom_count}`,
                    "rotate_content": `${this.elem_unique[1]}_rotate_content_${this.dom_count}`
                },
                "dom" : `
                    <div class="${this.elem_unique[0]}_content" id="${this.elem_unique[1]}_${this.dom_count}" data-id="${this.elem_unique[1]}_${this.dom_count}">
                        <div class="rotate" id="${this.elem_unique[1]}_rotate_${this.dom_count}" data-rotate="${this.elem_unique[1]}_${this.dom_count}"></div>
                        <div class="rotate-center" id="${this.elem_unique[1]}_rotate_center_${this.dom_count}" data-rotate="${this.elem_unique[1]}_${this.dom_count}"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" data-id="${this.elem_unique[1]}_${this.dom_count}" class="edit_svg" id="${this.elem_unique[1]}_rotate_content_${this.dom_count}">
                            <foreignObject width="100%" height="100%" x="0" y="0"  data-id="${this.elem_unique[1]}_${this.dom_count}">
                                <div xmlns="http://www.w3.org/1999/xhtml" contenteditable="true" class="text"  data-id="${this.elem_unique[1]}_${this.dom_count}">
                                    <text data-id="${this.elem_unique[1]}_${this.dom_count}">テキスト1</text>
                                </div>
                            </foreignObject>
                        </svg>                  
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
function addMouseEvent(elem_value) {
    el[temp_objects[elem_value].id] = {
        "move_elem": document.getElementById(temp_objects[elem_value].id),
        "rotate_center": document.getElementById(temp_objects[elem_value].rotate.rotate_center_id),
        "rotate_top_fix_point": document.getElementById(temp_objects[elem_value].rotate.rotate_id),
        "rotate_content": document.getElementById(temp_objects[elem_value].rotate.rotate_content),
    };
    el[temp_objects[elem_value].id].move_elem.addEventListener("mousedown", mousedown);
    el[temp_objects[elem_value].id].rotate_top_fix_point.addEventListener('mousedown', mousedownRotate)
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
        var BtnRef =  e.composedPath();
        var value_content = tempBtnRef[BtnRef[0].dataset.tempid]
        var value = value_content.getAttribute('value');
        
        // DOMのinsert
        var insert = document.getElementById("data");
        insert.insertAdjacentHTML('afterbegin', temp_objects[value].dom);

        // insertされたDOMにドラッグイベントを付加
        addMouseEvent(value);

        //incrementCount
        count++;
    } catch (e) {
        // 例外・error
        console.log(e.message);
    }
}

