<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use Illuminate\Support\Facades\Hash;

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
        $users = User::get();
        return view(
            'home',
            ['users' => $users]
        );
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
