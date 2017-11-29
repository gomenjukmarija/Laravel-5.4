<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
		$tasks = Task::all();
	    return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
	    return view('tasks.show', compact('task'));  
	 // Result:   
	    //{
		// 	"id": 1,
		// 	"body": "Go to the market",
		// 	"completed": 1,
		// 	"created_at": "2017-11-28 19:43:49",
		// 	"updated_at": "2017-11-28 19:43:49"
		// } 	
    }
}
