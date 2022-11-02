var count = 0; // 挿入済みHTMLDOMのテンプレート総数をカウントする
let txt = document.getElementById("temp"); // ボタン要素
txt.addEventListener('click', insert_dom);

/**
 * テンプレートHTMLDOMが格納されたオブジェクトを生成するクラス
 * @param {Template_object} dom_count IDのユニーク化
 * @param {Template_object} dom_elem テンプレートはこのオブジェクト内に記述
 */

class Template_object{
    constructor(count) {
        this.dom_count = count;
    }
    get temp_object_class(){
        this.dom_elem = {
            "ft_content" :  {
            "id" : `ft_${this.dom_count}`,
            "dom" : `
                <div class="ft_content" id="ft_${this.dom_count}" data-id="ft_${this.dom_count}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" data-id="ft_${this.dom_count}" class="edit_svg">
                    <foreignObject width="100%" height="100%" x="0" y="0"  data-id="ft_${this.dom_count}">
                        <div xmlns="http://www.w3.org/1999/xhtml" contenteditable="true" class="text"  data-id="ft_${this.dom_count}">
                            <text data-id="ft_${this.dom_count}">テキスト1</text>
                        </div>
                    </foreignObject>
                    </svg>                  
                </div>
            `},
            "sc_content" :  {
                "id" : `sc_${this.dom_count}`,
                "dom" : `
                    <div class="ft_content" id="ft_${this.dom_count}" data-id="sc_${this.dom_count}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" data-id="sc_${this.dom_count}">
                        <foreignObject width="100%" height="100%" x="0" y="0"  data-id="sc_${this.dom_count}">
                            <div xmlns="http://www.w3.org/1999/xhtml" contenteditable="true" class="text"  data-id="sc_${this.dom_count}">
                                <text  data-id="sc_${this.dom_count}">テキスト2</text>
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
    el[temp_objects[elem_value].id] = document.getElementById(temp_objects[elem_value].id);
    el[temp_objects[elem_value].id].addEventListener("mousedown", mousedown);
}

/**
 * DOMをinsertし、Mouseイベントを追加する一連の処理
 */
async function insert_dom() {
    try {
        // resolveするまで、以下を実行しない
        // debugger;
        await Promise.resolve();

        // インスタンス生成
        temp_objects = new Template_object(count).temp_object_class;
        
        var insert = document.getElementById("data");
        var value = txt.getAttribute('value');
        
        // DOMのinsert
        insert.insertAdjacentHTML('afterbegin', temp_objects[value].dom);

        addMouseEvent(value);
        count++;
    } catch (e) {
        // 例外・error
        console.log(e.message);
    }
}

