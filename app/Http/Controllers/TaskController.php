<?php

namespace App\Http\Controllers;

use App\Models\Task;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $user = Auth::user();

        return view('task.index', ['tasks' => $tasks, 'user' => $user]);
    }

    public function storeTask(Request $request)
    {
        Task::create([
            'content' => $request->content,
        ]);
        
        return redirect()->route('store')->with('success', '成功');
    }
}
