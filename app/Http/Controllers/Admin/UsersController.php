<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::IsCostumer()->get();
        return view('admin-dashboard.users.index', compact('users'));
    }
}
