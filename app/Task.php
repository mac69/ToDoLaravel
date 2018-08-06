<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'TaskId';
    protected $table = 'tasks';
}
