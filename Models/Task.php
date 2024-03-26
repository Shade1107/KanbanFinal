<?php
    require_once("Model.php");
    require_once("../Repositories/TaskRepository.php");

    class Task extends Model{
        public $id;
        public $project_id;
        public $project;
        public $stage_id;
        public $stage;
        public $short_description;
        public $task_name;
        
        public function __construct($id, $project_id, $stage_id, $short_description, $task_name)
        {
            $this->id                   = $id;
            $this->project_id           = $project_id;
            $this->project              = TaskRepository::getProjectName($this);
            $this->stage_id             = $stage_id;
            $this->stage                = TaskRepository::getTaskStage($this);
            $this->short_description    = $short_description;
            $this->task_name            = $task_name;
        }

        public function getStage(){
            return $this->stage;    
        }

        public function getPjName(){
            return $this->project;    
        }
    }
?>