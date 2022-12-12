
window.onload = async function(){
    try {
        // debugger;
        var insert_pr = document.getElementById("history");
        var edit_history = await get_edit_history();

        if (!edit_history.length == 0) {
            edit_history.forEach((elem)=>{
                console.log(elem.title);
                insert_pr.insertAdjacentHTML("afterbegin", create_history_dom(elem.edit_id, elem.title));
            });
        }else {
            console.log("NO Data");
            insert_pr.insertAdjacentHTML("afterbegin", create_history_dom("", ""));
        }

        const redraw_element = document.querySelectorAll(".history");
        redraw_element.forEach((element)=>{
            element.addEventListener("click", (e)=>{
                var id = get_id(e, "edit_id");
                location.href = "./edit.php?edit_id=" + encodeURIComponent(id);
            });
        });
        
        

    } catch (error) {
        console.log(error);
    }

}

function create_history_dom(id, title){
    if (!id && !title) {
        return `
            <div class="history-content">編集した手紙のデータはありません</div>
        `;
    }

    return `
        <div class="history-content history" data-edit_id="${id}">
            <div class="history-id" data-edit_id="${id}">編集画面ID : ${id}</div><div class="history-tile" data-edit_id="${id}">タイトル : ${title}</div>
        </div>
    `;
}

function get_id(event, specified_key){
    clickedDom = event.composedPath();
    return clickedDom[0].dataset[specified_key];    
}