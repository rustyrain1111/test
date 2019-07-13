<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class BaseController extends Controller
{
	public function index() {
		return view('admin/test');
	}

	public function test() {
		return view('admin/test');
	}

	public function getUsers() {
		return view('admin/users', [
			'users' => User::withTrashed()
				->orderBy('id')
				->paginate(env('USER_PAGINATION')),
			'count' => User::count(),
		]);
	}

	public function deleteUser($id) {
		User::where('id', $id)->delete();

		return redirect()->back();
	}

	public function restoreUser($id) {
		User::where('id', $id)->restore();

		return redirect()->back();
	}
}
