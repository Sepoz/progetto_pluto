<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function adminHome()
    {
        $users = User::where('has_requested', 1)
                            ->where('is_revisor', 0)
                            ->where('is_admin', 0)
                            ->orderBy('id')
                            ->first();
        return view('adminHome', compact('users'));
    }

    public function adminAccept($user_id)
    {
        $user = User::find($user_id);
        $user->is_revisor = true;
        $user->has_requested = false;
        $user->save();
        return redirect()->route('adminHome');
    }

    public function adminReject($user_id)
    {
        $user = User::find($user_id);
        $user->is_revisor = false;
        $user->save();
        return redirect()->route('adminHome');
    }

    public function adminUndo()
    {
        $user = User::where('is_revisor', 1)
                             ->latest('created_at')
                             ->first();
        $user->is_revisor = null;
        $user->save();
        return redirect(route('adminHome'));
    }
}
