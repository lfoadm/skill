<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $driver = $user->driver->first();
        return view('admin.web.profile.index', compact('user', 'driver'));
    }

    public function update(Request $request, $id)
    {
        if(!$user = User::find($id))
            return redirect()->route('dashboard');
        $data = $request->only('name', 'phone', 'address', 'number', 'district', 'city', 'state');
        $user->update($data);
        return redirect()->route('admin.profile.index')->with('success', 'Dados atualizado com sucesso!');
    }
}
