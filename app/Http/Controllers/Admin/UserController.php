<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
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
        return $this->adminView('dashboard.index', ['users' => $users]);
//        return view(
//            'admin.dashboard.index',
//            ['users' => $users]
//        );
    }
    public function create()
    {
        return $this->adminView(
            'users.edit',
            ['user' => null]
        );
    }

    public function edit($id)
    {
        $user = User::find($id);

        return $this->adminView(
            'users.edit',
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
        return redirect()->route('user.index');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return redirect()->route('user.index');
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
        return redirect()->route('user.index');
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
