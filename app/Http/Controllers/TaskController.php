<?php

namespace App\Http\Controllers;

use App\Models\Task;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tasks = Task::where('user_id', '=',  $user->id)->oldest()->get();
        return view('task.index', ['tasks' => $tasks, 'user' => $user]);
    }

    public function storeTask(Request $request)
    {

        $request->validate([
            'content' => 'required|string|max:80',
        ]);

        Task::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('index')->with('success', '成功');
    }

    public function taskDel(Task $task){
        $task->delete();

        return redirect()->route('index')->with('success', 'delete complete');
    }
}
