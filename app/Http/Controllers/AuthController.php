<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\AuthRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $repo;
    public function __construct(AuthRepo $repo)
    {
        $this->repo = $repo;
    }
    public function register(Request $request)
    {
       return $this->repo->register($request);
    }

    public function login(Request $request)
    {
       return $this->repo->login($request);
    }
    
    public function logout(Request $request)
    {
       return $this->repo->logout($request);
    }
}
