<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aktivitas;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $kasirs = User::where('role', 'kasir')->get();
        return view('kasir.index', compact('kasirs'));
    }

    public function create()
    {
        return view('kasir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'kasir';
        
        User::create($data);
        
        Aktivitas::create([
            'judul' => 'Akun Kasir Dibuat',
            'deskripsi' => 'Akun kasir ' . $request->name . ' (' . $request->username . ') telah didaftarkan.',
            'tipe' => 'success'
        ]);
        return redirect()->route('kasir.index')->with('success', 'Akun Kasir berhasil didaftarkan.');
    }

    public function edit($id)
    {
        $kasir = User::findOrFail($id);
        return view('kasir.edit', compact('kasir'));
    }

    public function update(Request $request, $id)
    {
        $kasir = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$kasir->id,
            'password' => 'nullable|min:6',
        ]);
        
        $data = $request->only(['name', 'username']);
        if($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        
        $kasir->update($data);
        
        Aktivitas::create([
            'judul' => 'Akun Kasir Diubah',
            'deskripsi' => 'Data akun kasir ' . $request->name . ' telah diperbarui.',
            'tipe' => 'info'
        ]);
        return redirect()->route('kasir.index')->with('success', 'Akun Kasir berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kasir = User::findOrFail($id);
        $nama = $kasir->name;
        $kasir->delete();
        Aktivitas::create([
            'judul' => 'Akun Kasir Dihapus',
            'deskripsi' => 'Akun Kasir ' . $nama . ' telah dihapus dari sistem.',
            'tipe' => 'warning'
        ]);
        return redirect()->route('kasir.index')->with('success', 'Akun Kasir berhasil dihapus.');
    }
}
