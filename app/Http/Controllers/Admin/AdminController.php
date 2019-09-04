<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
     *
     *
     */

    public function index()
    {
        $users = User::withTrashed()->get();
        return view(
            'admin.dashboard.index',
            ['users' => $users]
        );
    }
    public function create()
    {
        return view(
            'admin.users.edit',
            ['user' => null]
        );
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view(
            'admin.users.edit',
            ['user' => $user]
        );
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return redirect('admin/admin');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return redirect('admin/admin');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function block(Request $request,$id)
    {
        $user = User::find($id);
        if ((bool)$user->is_block)
        {
            $user->is_block = 0;
        }
        else
        {
            $user->is_block = 1;
        }
        $user->save();
        return redirect('admin/admin');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        User::where('id', $id)->restore();
        return redirect()->back();
    }

}
