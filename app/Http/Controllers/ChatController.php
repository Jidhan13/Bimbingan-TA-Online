<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        //select all user except logged in user
        $users = User::where('id', '!=', Auth::id())->get();
        return view('chat.index', ['users' => $users]);
    }
}
