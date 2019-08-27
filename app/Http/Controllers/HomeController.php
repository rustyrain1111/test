<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use app\User;
use Illuminate\Support\Facades\Hash;
=======
use app\Models\User;
>>>>>>> 928174526e942000ee0cd4e61a819231b56d1eab

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        $users = User::get();
        return view(
            'home',
            ['users' => $users]
        );
=======
        return view('home');
>>>>>>> 928174526e942000ee0cd4e61a819231b56d1eab
    }
//    public function create()
//    {
//        return view(
//            'user.edit',
//            ['user' => null]
//        );
//    }
//
//    public function edit($id)
//    {
//        $user = User::find($id);
//
//        return view(
//            'user.edit',
//            ['user' => $user]
//        );
//    }
//
//    public function store(Request $request)
//    {
//        $user = new User();
//        $user->name = $request->get('name');
//        $user->email = $request->get('email');
//        $user->password = Hash::make($request->get('password'));
//        $user->save();
//        return redirect('home');
//    }
//
//    public function update(Request $request, $id)
//    {
//        $user = User::find($id);
//        $user->name = $request->get('name');
//        $user->email = $request->get('email');
//        $user->password = Hash::make($request->get('password'));
//        $user->save();
//        return redirect('home');
//    }
}
