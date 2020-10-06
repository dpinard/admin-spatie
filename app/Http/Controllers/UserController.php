<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $users = User::all();
        
        return view('admin', [
            'msg' => 'tous',
            'data' => $users
        ]);
    }

    public function moveUpRole($role) 
    {
        $user = User::where('id', $role)->first();
        $res = $user->assignRole('admin');
        return back();
    }

    public function moveDownRole($role)
    {
        $user = User::where('id', $role)->first();
        $res = $user->removeRole('admin');
        return back();
    }

    public function admin($option) {
        if ($option === 'admin'){
            $user = User::hasAdmin()
                ->get();
        }
        else if ($option === 'user'){
            $user = User::hasUser()
                ->get();
        }
        else if ($option === 'online'){
            $user = User::isOnline()
                ->get();
        }

        return view('admin', [
            'msg' => $option,
            'data' => $user
        ]);
    }


}
