<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'due_date', 'completed'];

    public function getInfo()
    {
        $status = $this->completed ? 'Completed' : 'Pending';
        return "{$this->description} ";
    }

    public function isCompleted()
    {
        return $this->attributes['completed'];
    }
}
