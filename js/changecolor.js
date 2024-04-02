function Delete(task){
    const TasktoDelete = task.closest('.task-container');
    // alert('Are you sure?');
    TasktoDelete.remove();

    $('#exampleModalCenter').modal('hide');
    $('.modal-backdrop').remove(); // Remove the backdrop
}



  function changecolor(canvas, color, borderColor) {
    // console.log("Canvas class:", canvas.classList);
    const hasCanvas1 = canvas.classList.contains("canvas1");
    const hasCanvas2 = canvas.classList.contains("canvas2");
  
    if (hasCanvas1) {
        const taskContainer = canvas.closest('.task-container');
  
        if (taskContainer) {
            taskContainer.className = 'task-container';
            taskContainer.classList.add('YFirstCardBorder');
            taskContainer.classList.add(color);
  
            const taskHeader = taskContainer.querySelector('.task-header');
  
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YfirstPriority');
            }
  
            // Update the border color of the task container
            taskContainer.style.borderColor = borderColor;
        }
    } else if (hasCanvas2) {
        const taskContainer = canvas.closest('.task-container');
  
        if (taskContainer) {
            taskContainer.className = 'task-container';
            taskContainer.classList.add('YSecondCardBorder');
            taskContainer.classList.add(color);
  
            const taskHeader = taskContainer.querySelector('.task-header');
  
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YsecondPriority');
            }
  
            // Update the border color of the task container
            taskContainer.style.borderColor = borderColor;
        }
    } else {
        const taskContainer = canvas.closest('.task-container');
  
        if (taskContainer) {
            taskContainer.className = 'task-container';
            taskContainer.classList.add('YThirdCardBorder');
            taskContainer.classList.add(color);
  
            const taskHeader = taskContainer.querySelector('.task-header');
  
            if (taskHeader) {
                taskHeader.className = 'task-header';    
                taskHeader.classList.add('YthirdPriority');
            }
  
            // Update the border color of the task container
            taskContainer.style.borderColor = borderColor;
        }
    }
  }