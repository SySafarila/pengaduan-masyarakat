<?php

namespace App\Http\Controllers;
use app\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('pages.users.index', compact('users'));
    }
}
