<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class ToDoController extends Controller
{
    public function index ()
    {
        $taskList = Task::select('TaskId','TaskName', 'TaskStatus')->get()->toJson();        
        return $taskList;
        // return '{
        //     "TaskId": 2,
        //     "TaskName": "Task 2",
        //     "TaskStatus": 0
        // }';
    }

    public function store (Request $request)
    {
        $taskList = new Task;
        $taskList->TaskName = $request->TaskName;
        $taskList->TaskStatus = $request->TaskStatus;
        $taskList->save();
    }

    public function updateName (Request $request)
    {
        $taskList = Task::find($request->TaskId);
        $taskList->TaskName = $request->TaskName;
        $taskList->save();
    }

    public function updateStatus (Request $request)
    {
        $taskList = Task::find($request->TaskId);
        $taskList->TaskStatus = $request->TaskStatus;
        $taskList->save();
    }

    public function destroy (Request $request)
    {
        $taskList = Task::find($request->TaskId);
        $taskList->delete();
    }
}
