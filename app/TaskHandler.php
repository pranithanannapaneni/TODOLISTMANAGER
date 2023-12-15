<?php

namespace App;

class TaskHandler
{
    private $id;
    private $description;
    private $dueDate;
    private $completed;

    public function __construct($description, $dueDate = null)
    {
        $this->description = $description;
        $this->dueDate = $dueDate;
        $this->completed = false;
    }

    public function markAsCompleted()
    {
        $this->completed = true;
    }

    public function markAsPending()
    {
        $this->completed = false;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDueDate() 
    {
        return $this->dueDate;
    }

    public function isCompleted()
    {
        return $this->completed;
    }

    public function getInfo()
    {
        $status = $this->completed ? 'Completed' : 'Pending';
        return "{$this->description} - {$status}, Due: {$this->dueDate}";
    }
}

