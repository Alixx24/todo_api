<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Repository\Task\CategoryRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public $repo;
    public function __construct(CategoryRepo $repo)
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

    public function destroy($id)
    {
        return $this->repo->destroy($id);

    }
}
