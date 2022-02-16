<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        // $a =['created' => 'dhdj'];
        return response()->json(Admin::select('id', 'acc', 'pw')->get());
        // return $a;
    }
    public function store(Request $request)
    {
        $article = Admin::create($request->all());
        return response()->json($article, 201);
    }
}
