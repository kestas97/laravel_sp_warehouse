<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data['users'] = User::paginate(13);

        return view('admin.user-panel', $data);
    }

    public function activateUser($userId)
    {
        $user = User::find($userId);
        $user->active = 1;
        $user->save();
        return back()->with('message', 'User is activated');
    }

    public function deactivateUser($userId)
    {
        $user = User::find($userId);
        $user->active = 0;
        $user->save();
        return back()->with('message', 'User is inactivated');
    }

    public function destroy($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return back()->with('message', 'User is deleted');
    }

}
