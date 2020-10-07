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

    public function index(Request $request) 
    {
        $users = User::all();
        
        return view('admin', [
            'msg' => 'tous',
            'data' => $users
        ]);
    }

    public function moveUpRole(User $user) 
    {
        $user->assignRole('admin');
        return back();
    }

    public function moveDownRole(User $user)
    {
        $user->removeRole('admin');
        return back();
    }

    public function admin(Request $request, $option) 
    {               
        if ($option === 'online')
        {
            $user = User::isOnline()
            ->get();
        }
        else 
        {
            $user = User::role($option)->get();
        }

        return view('admin', [
            'msg' => $option,
            'data' => $user
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('admin');
    }

}
