<?php


namespace App;

class TaskBuilder
{
    private $description;
    private $dueDate;

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function build()
    {
        return new TaskHandler($this->description, $this->dueDate);
    }
}


