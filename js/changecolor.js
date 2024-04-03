function Delete(task){
    let TasktoDelete = task.closest('.task-container');
    // alert('Are you sure?');
    TasktoDelete.remove();

    $('#exampleModalCenter').modal('hide');
    $('.modal-backdrop').remove(); // Remove the backdrop
}
function changecolor(canvas) {
    // console.log("Canvas class:", canvas.classList);
    let task_id           =     document.classList("task_id");
    let hasCanvas1        =     canvas.classList.contains("canvas1");
    let hasCanvas2        =     canvas.classList.contains("canvas2");
    let new_taskContainer =     '';
    let new_taskHeader    =     '';
    // let hasCanvas3 = canvas.classList.contains("canvas3");
    // Get the parent task-container element
    if (hasCanvas1) {
        let taskContainer = canvas.closest('.task-container');
  
        // Check if the task-container element exists
        if (taskContainer) {
           
             // Remove all existing classes from the task-container element
            taskContainer.className = 'task-container';
            
            // Add 'YFirstCardBorder' class to the task-container element    
            taskContainer.classList.add('YFirstCardBorder');
  
            // Find the task-header element within the task-container
            let taskHeader = taskContainer.querySelector('.task-header');
  
            // Set the background color of the task-header element
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YfirstPriority');
            }
        }
        new_taskContainer =  'task-container YFirstCardBorder';
        new_taskHeader    =  'task-header YfirstPriority';
    }else if(hasCanvas2){
  
        let taskContainer = canvas.closest('.task-container');
  
        // Check if the task-container element exists
        if (taskContainer) {
           
            taskContainer.className = 'task-container';
            taskContainer.classList.add('YSecondCardBorder');
  
           
            let taskHeader = taskContainer.querySelector('.task-header');
  
           
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YsecondPriority');
            }
        }
        new_taskContainer =  'task-container YSecondCardBorder';
        new_taskHeader    =  'task-header YsecondPriority';
    }else {
  
        let taskContainer = canvas.closest('.task-container');
  
        // Check if the task-container element exists
        if (taskContainer) {
            // Remove all existing classes from the task-container element
            taskContainer.className = 'task-container';
  
            // Add 'YFirstCardBorder' class to the task-container element
            taskContainer.classList.add('YThirdCardBorder');
  
            // Find the task-header element within the task-container
            let taskHeader = taskContainer.querySelector('.task-header');
  
            // Set the background color of the task-header element
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YthirdPriority');
            }
        }
        new_taskContainer =  'task-container YThirdCardBorder';
        new_taskHeader    =  'task-header YthirdPriority';
    }
    console.log(task_id);
    console.log(new_taskContainer);
    console.log(new_taskHeader);
    ChgPColor4Tasks(task_id,new_taskContainer,new_taskHeader);
  }
  
  function ChgPColor4Tasks(task_id,new_taskContainer,new_taskHeader) {
    let url = '../Functions4Kanban/TasksPColorChg.php?task_id=' + task_id + '&=taskContainer' + new_taskContainer +'&=taskHeader' + new_taskHeader;

    //alternative approach use jquery $.get().... 
    let xhttp = new XMLHttpRequest();
    //onload == response code 200 and status 4.. request no error and completed
    xhttp.onload = function (xhttp) {
        let response = JSON.parse(xhttp.target.responseText);
        if (response.code == 1) {//success
            console.log('success');
        }
    };
    xhttp.open("GET", url);
    xhttp.send();
}