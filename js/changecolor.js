function Delete(task){
    const TasktoDelete = task.closest('.task-container');
    // alert('Are you sure?');
    TasktoDelete.remove();

    $('#exampleModalCenter').modal('hide');
    $('.modal-backdrop').remove(); // Remove the backdrop
}

function allowDrop(ev) {
    ev.preventDefault();
  }
  
  function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }
  
//   function drop(ev) {
//     ev.preventDefault();
//     var data = ev.dataTransfer.getData("text");
//     ev.target.appendChild(document.getElementById(data));
//   }


function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text");
    
    event.target.appendChild(document.getElementById(data));
    var draggedElement = document.getElementById(data);
    var target = event.target.closest('.task-container');
    var tasks = target.closest('.task-list').querySelectorAll('.task-container');
  
    // Get the index of the dropped task
    var droppedIndex = Array.from(tasks).indexOf(draggedElement);
  
    // Get the index of the target task (if dropping onto another task)
    var targetIndex = Array.from(tasks).indexOf(target);
  
    // If dropping onto another task, adjust the target index
    if (targetIndex !== -1) {
      if (droppedIndex < targetIndex) {
        targetIndex--; // Adjust index for dropping above the target task
      }else {
      targetIndex = tasks.length; // Append to the end if dropping at the bottom of the column
    }
}
  
    // Insert the dragged task at the correct position
    if (droppedIndex < targetIndex) {
      target.parentNode.insertBefore(draggedElement, target);
    } else {
      if (targetIndex === 0) {
        target.parentNode.insertBefore(draggedElement, tasks[0]);
      } else {
        target.parentNode.insertBefore(draggedElement, tasks[targetIndex]);
      }
    }
  }

  function changecolor(canvas, color) {
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
        }
    }
}