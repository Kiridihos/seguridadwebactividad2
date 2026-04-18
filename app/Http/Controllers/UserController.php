<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of created users.
     */
    public function index()
    {
        $users = User::query()
            ->latest()
            ->paginate(10);

        return view('users.index', compact('users'));
    }
}
