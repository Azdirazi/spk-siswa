<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function view(User $user)
    {
        $userData = User::With(['grade'])->get();
        return view('dashboard.dashboard', compact('userData'));
    }
    public function viewAdd(Grade $grade)
    {    $gradeData = $grade->get();
        return view('dashboard.add-user',compact('gradeData'));
    }
    public function add(Request $request, User $user)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->create($data);
        return redirect(route('dashboard.view'))->with('success', 'Data user berhasil ditambahkan');
    }
    public function viewEdit(User $user, Grade $grade)
    {   $gradeData = $grade->get();
        return view('dashboard.edit-user', compact('user','gradeData'));
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
