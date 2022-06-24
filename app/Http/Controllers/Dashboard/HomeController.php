<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    function reset()
    {
        $user = Auth::user();
        return view('dashboard.reset', [
            'user' => $user
        ]);
    }

    function edit()
    {
        $user = Auth::user();
        return view('dashboard.edit', [
            'user' => $user
        ]);
    }

    function updateUserOptions()
    {
        $user = Auth::user();

        $user->description = request('description');
        $user->instagram = request('instagram');
        $user->phone = request('phone');
        $user->name = request('name');

        if ($user->save())
            return redirect()->route('admin.home')->with('info', "اطلاعات شما با موفقیت تعویض شد.");
        return back();
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
