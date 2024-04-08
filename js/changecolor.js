function Delete(task){
    let TasktoDelete = task.closest('.task-container');
    // alert('Are you sure?');
    TasktoDelete.remove();

    $('#exampleModalCenter').modal('hide');
    $('.modal-backdrop').remove(); // Remove the backdrop
}
  
  function KdeleteMember(memberId) {
    console.log("hello");
    jQuery.ajax({
        url: '../pages/delete_memberlist.php',
        type: 'GET',
        data: { id: memberId },
        success: function(response) {
            // Optionally, you can handle success response
            console.log('Member deleted successfully');
            $('#' + memberId).modal('hide');
            $('.modal-backdrop').remove();
            // Remove the list item corresponding to the deleted member
            $('#listItem_' + memberId).remove();
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error deleting member:', error);
        }
    });
  
   
  }
  
  function hello(){
    console.log("hello");
  }





function changecolor(canvas) {
    // console.log("Canvas class:", canvas.classList);
    let hasCanvas1        =     canvas.classList.contains("canvas1");
    let hasCanvas2        =     canvas.classList.contains("canvas2");
    let new_taskContainer =     '';
    let new_taskHeader    =     '';
    let taskContainer = canvas.closest('.task-container');
    // let hasCanvas3 = canvas.classList.contains("canvas3");
    // Get the parent task-container element
    if (hasCanvas1) {
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
        new_taskContainer =  'YFirstCardBorder';
        new_taskHeader    =  'YfirstPriority';
    }else if(hasCanvas2){
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
        new_taskContainer =  'YSecondCardBorder';
        new_taskHeader    =  'YsecondPriority';
    }else {  
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
        new_taskContainer =  'YThirdCardBorder';
        new_taskHeader    =  'YthirdPriority';
    }
    let task_id           =     taskContainer.getAttribute('task_id');
    // console.log(task_id);
    // console.log(new_taskContainer);
    // console.log(new_taskHeader);

    ChgPColor4Tasks(task_id,new_taskContainer,new_taskHeader);

    console.log('<br>');
    console.log('after');
    console.log(task_id);
    console.log(new_taskContainer);
    console.log(new_taskHeader);
  }
  
  function ChgPColor4Tasks(task_id,new_taskContainer,new_taskHeader) {
    let url = '../Functions4Kanban/TasksPColorChg.php?task_id=' + task_id + '&new_taskContainer=' + new_taskContainer + '&new_taskHeader=' + new_taskHeader;

    //alternative approach use jquery $.get().... 
    const xhttp = new XMLHttpRequest();
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