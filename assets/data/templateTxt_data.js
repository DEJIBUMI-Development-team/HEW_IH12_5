localStorage.clear();
var count = 0;
localStorage.setItem("count", count)
let txt = document.getElementById("temp");
txt.addEventListener('click', insert_dom);

var temp_object = {
    "ft_content" :  {
        "id" : `ft_${localStorage.getItem("count")}`,
        "dom" : `
            <div class="ft_content" id="ft_${localStorage.getItem("count")}">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <foreignObject width="100%" height="100%" x="0" y="0">
                    <div xmlns="http://www.w3.org/1999/xhtml" contenteditable="true" class="text">
                        <text>テキスト1</text>
                    </div>
                </foreignObject>
                </svg>                  
            </div>
        `
    },
    "sd_content" :  {
        "dom" : `
            <div class="ft_content">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <foreignObject width="100%" height="100%" x="0" y="0">
                    <div xmlns="http://www.w3.org/1999/xhtml" contenteditable="true" class="text">
                        <text>テキスト2</text>
                    </div>
                </foreignObject>
                </svg>                  
            </div>
        `
    }
};

function insert_dom() {
    return Promise.resolve().then(()=>{
        let insert = document.getElementById("data");
        var value = txt.getAttribute('value');
        insert.insertAdjacentHTML('afterbegin', temp_object[value].dom);
        return value;

    }).then((elem_value)=>{
        debugger;
        el = document.getElementById(temp_object[elem_value].id);
        el.addEventListener("mousedown", mousedown);

    }).then(()=>{
        count++;
        localStorage.setItem("count", count);
    }).catch((e) => {
        console.log(e.message)
    });
}


let isResizing = false;

//itemがクリックされたとき
function mousedown(e) {
    // debugger;
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


