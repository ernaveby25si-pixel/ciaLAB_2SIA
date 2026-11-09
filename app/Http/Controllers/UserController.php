<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua user.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Menampilkan formulir untuk membuat user baru.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Menyimpan user baru ke database dengan validasi & Hash::make.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required'      => 'Nama lengkap wajib diisi.',
            'name.max'           => 'Nama maksimal 255 karakter.',
            'email.required'     => 'Alamat email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah digunakan oleh akun lain.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        // 2. Simpan Data dengan Hash::make
        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // 3. Redirect dengan Pesan Sukses
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail informasi satu user.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Menampilkan formulir untuk mengedit data user.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Memperbarui data user yang ada.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // 1. Validasi Input Form (Password bersifat opsional saat edit)
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ], [
            'name.required'      => 'Nama lengkap wajib diisi.',
            'name.max'           => 'Nama maksimal 255 karakter.',
            'email.required'     => 'Alamat email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah digunakan oleh akun lain.',
            'password.min'       => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        $dataToUpdate = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        // 2. Jika password diisi, lakukan Hash::make
        if (!empty($validated['password'])) {
            $dataToUpdate['password'] = Hash::make($validated['password']);
        }

        $user->update($dataToUpdate);

        // 3. Redirect dengan Pesan Sukses
        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui!');
    }

    /**
     * Menghapus user dari database.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
