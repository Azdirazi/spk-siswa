<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function view(User $user)
    {
        $userData = $user->get();
        return view('dashboard.dashboard', compact('userData'));
    }
    public function viewAdd()
    {
        return view('dashboard.add-user');
    }
    public function add(Request $request, User $user)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->create($data);
        return redirect(route('dashboard.view'))->with('success', 'Data user berhasil ditambahkan');
    }
    public function viewEdit(User $user)
    {
        return view('dashboard.edit-user', compact('user'));
    }
    public function edit(Request $request, User $user)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
        return redirect(route('dashboard.view'))->with('success', 'Data user berhasil diubah');
    }
    public function delete(User $user,)
    {
        $user->delete();
        return redirect(route('dashboard.view'))->with('success', 'Data user berhasil diubah');
    }
}
