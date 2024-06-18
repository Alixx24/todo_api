<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task\CategoryRepo;
use App\Models\Task\Task;
use App\Repository\Task\TaskRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public $repo;
    public function __construct(TaskRepo $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
        return $this->repo->index();
    }
    
    public function store(Request $request)
    {
        return $this->repo->store($request);
    }

       public function update(Request $request, Task $task)
    {
        return $this->repo->update($request, $task);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);

    }
}
