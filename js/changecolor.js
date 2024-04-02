function Delete(task){
    const TasktoDelete = task.closest('.task-container');
    // alert('Are you sure?');
    TasktoDelete.remove();

    $('#exampleModalCenter').modal('hide');
    $('.modal-backdrop').remove(); // Remove the backdrop
}
function changecolor(canvas) {
    // console.log("Canvas class:", canvas.classList);
    const hasCanvas1 = canvas.classList.contains("canvas1");
    const hasCanvas2 = canvas.classList.contains("canvas2");
    // const hasCanvas3 = canvas.classList.contains("canvas3");
    // Get the parent task-container element
    if (hasCanvas1) {
        const taskContainer = canvas.closest('.task-container');
  
        // Check if the task-container element exists
        if (taskContainer) {
           
             // Remove all existing classes from the task-container element
            taskContainer.className = 'task-container';
            
            // Add 'YFirstCardBorder' class to the task-container element    
            taskContainer.classList.add('YFirstCardBorder');
  
            // Find the task-header element within the task-container
            const taskHeader = taskContainer.querySelector('.task-header');
  
            // Set the background color of the task-header element
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YfirstPriority');
            }
        }
    }else if(hasCanvas2){
  
        const taskContainer = canvas.closest('.task-container');
  
        // Check if the task-container element exists
        if (taskContainer) {
           
            taskContainer.className = 'task-container';
            taskContainer.classList.add('YSecondCardBorder');
  
           
            const taskHeader = taskContainer.querySelector('.task-header');
  
           
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YsecondPriority');
            }
        }
  
    }else {
  
        const taskContainer = canvas.closest('.task-container');
  
        // Check if the task-container element exists
        if (taskContainer) {
            // Remove all existing classes from the task-container element
            taskContainer.className = 'task-container';
  
            // Add 'YFirstCardBorder' class to the task-container element
            taskContainer.classList.add('YThirdCardBorder');
  
            // Find the task-header element within the task-container
            const taskHeader = taskContainer.querySelector('.task-header');
  
            // Set the background color of the task-header element
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YthirdPriority');
            }
        }
    }
  }
  function ChgPColor4Tasks(task_id,taskContainer,taskHeader) {
    //get requerst formal querystring  => task_id=1&stage_id=2...
    let url = '../tasks/task_stage_update.php?task_id=' + task_id + '&stage_id=' + new_stage_id;

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


  function update_task_prior_colour(task_id, new_stage_id, task_div, new_stage_div) {
    //get requerst formal querystring  => task_id=1&stage_id=2...
    let url = '../tasks/task_stage_update.php?task_id=' + task_id + '&stage_id=' + new_stage_id;

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
