var count = 0;
let txt = document.getElementById("temp");
txt.addEventListener('click', insert_dom);

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
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" data-id="ft_${this.dom_count}">
                    <foreignObject width="100%" height="100%" x="0" y="0"  data-id="ft_${this.dom_count}">
                        <div xmlns="http://www.w3.org/1999/xhtml" contenteditable="true" class="text"  data-id="ft_${this.dom_count}">
                            <text  data-id="ft_${this.dom_count}">テキスト1</text>
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

function insert_dom() {
    return Promise.resolve().then(()=>{
		debugger;
        temp_objects =  new Template_object(count).temp_object_class;
    }).then(()=>{
        let insert = document.getElementById("data");
        var value = txt.getAttribute('value');
        insert.insertAdjacentHTML('afterbegin', temp_objects[value].dom);
        return value;

    }).then((elem_value)=>{

        el[temp_objects[elem_value].id] = document.getElementById(temp_objects[elem_value].id);
        el[temp_objects[elem_value].id].addEventListener("mousedown", mousedown);

    }).then(()=>{
        count++;
    }).catch((e) => {
        console.log(e.message)
    });
}
