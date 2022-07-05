<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->role_id != 1){
            return redirect()->route('homepage');
        }else{
            $data['users'] = User::paginate(13);
        }
        return view('admin.user-panel', $data);
    }

    public function activateUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->active = 1;
        $user->save();
        return back()->with('message', 'User is activated');
    }

    public function deactivateUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->active = 0;
        $user->save();
        return back()->with('message', 'User is inactivated');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return back()->with('message', 'User is deleted');
    }

}
