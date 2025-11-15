<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function switch(Request $request)
    {
        $user = Auth::user();
        
        // Hanya user dan pekerja yang bisa switch role
        if (!$user->canSwitchRole()) {
            return redirect()->back()->with('error', 'Anda tidak dapat mengubah role.');
        }

        $request->validate([
            'role' => 'required|in:user,pekerja',
        ]);

        $user->update([
            'role' => $request->role,
        ]);

        return redirect()->route('dashboard')->with('success', 'Role berhasil diubah menjadi ' . ucfirst($request->role));
    }
}

