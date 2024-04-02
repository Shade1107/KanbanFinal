
function allowDrop(ev) {
    ev.preventDefault();
    ev.target.classList.add('drag-over');
}
function dragLeave(ev) {
    ev.preventDefault();
    ev.target.classList.remove('drag-over');
}

function drag(ev) {
    let taskDiv = document.getElementById(ev.target.id);

    //user div id == user-d to move between role divs
    let task_div_id = ev.target.id;

    let task_id = taskDiv.getAttribute('task_id');
    let stage_id = taskDiv.getAttribute('stage_id');

    ev.dataTransfer.setData("task_div_id", task_div_id);
    ev.dataTransfer.setData("task_id", task_id);
    ev.dataTransfer.setData("stage_id", stage_id);

}

function drop(ev) {
    ev.preventDefault();
    ev.target.classList.remove('drag-over');
    //dragged task div
    let task_div = document.getElementById(ev.dataTransfer.getData("task_div_id"));
    let task_id = ev.dataTransfer.getData("task_id");

    let new_stage_div = document.getElementById(ev.target.id);
    //get new_stage_id from drop target stage div
    let new_stage_id = new_stage_div.getAttribute("stage_id");

    let target = ev.target.closest('.dropzone');

    //move to dropped div
    //ev.target.appendChild(task_div);
    //but before move the div in ui, request server to update task role.
    //ajax things
    update_task_stage(task_id, new_stage_id, task_div, target);


}
function update_task_stage(task_id, new_stage_id, task_div, new_stage_div) {
    //get requerst formal querystring  => task_id=1&stage_id=2...
    let url = 'task_stagee_update.php?user_id=' + task_id + '&stage_id=' + new_stage_id;

    //alternative approach use jquery $.get().... 
    const xhttp = new XMLHttpRequest();
    //onload == response code 200 and status 4.. request no error and completed
    xhttp.onload = function (xhttp) {
        let response = JSON.parse(xhttp.target.responseText);
        if (response.code == 1) {//success
            new_stage_div.appendChild(task_div);
            //assign to new stage
            task_div.setAttribute('stage_id', new_stage_id);
        }
    };
    xhttp.open("GET", url);
    xhttp.send();
}