<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    function index()
    {
        $user = Auth::user();
        return view('dashboard.index', [
            'user' => $user
        ]);
    }

    function resetPassword()
    {
        $validated = request()->validate([
            'password' => 'required|min:3|max:16'
        ]);

        $user = Auth::user();
        $user->password = Hash::make($validated['password']);
        if ($user->save())
            return redirect()->route('admin.home')->with('info', "رمز شما با موفقیت تعویض شد.");
        else
            return redirect()->back()->with('error', "رمز شما با موفقیت تعویض نشد.");

    }
}
