<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('family_id', Auth::user()->family_id)->get();
        return response()->json($todos);
    }

    public function toggle(Todo $todo)
    {
        $todo->update(['is_completed' => !$todo->is_completed]);
        return response()->json($todo);
    }
}