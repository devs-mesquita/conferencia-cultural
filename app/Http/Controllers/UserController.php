<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.usuario.index', compact('users'));
    }

    public function create()
    {

        return view('pages.usuario.create');
    }

    public function store()
    {

        $data = request();

        $user = new User;

        $user->name  = $data->name;
        $user->email = $data->email;
        $user->nivel = $data->nivel;
        $user->password = 'pmm123456';
        
        // dd($user);
        $user->save();

        return redirect('/user');
    }
}
