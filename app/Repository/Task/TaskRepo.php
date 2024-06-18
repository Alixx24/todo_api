<?php

namespace App\Repository\Task;

use App\Models\Task\Category;
use App\Models\Task\Task;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskRepo
{

    public function index()
    {

        $category = Task::where('user_id', Auth::id())->first();
        $tasks = Category::all();
        return response()->json($tasks);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|between:2,100',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->user_id = Auth::id();
        $task->cat_id = $request->cat_id;


        $task->save();
        return response()->json('task is Added');
    }

    public function update(Request $request, Task $task)
    {
        // if ($request->user()->id !== $task->user_id) {
        //     $task = Task::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|between:2,100',
            'cat_id' => 'nullable|exists:categories,id',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $task->title = $request->title;
        $task->cat_id = $request->cat_id;
        $task->save();
        return response()->json('task is updated');
        // }
        // return response()->json('You do not have access');
    }
    public function destroy($id)
    {

        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json('task is deleted');
    }
}
