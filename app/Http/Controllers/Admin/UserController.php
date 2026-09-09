<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
        ], [
            'password.min' => 'Şifreniz en az 8 karakter olmalıdır.',
            'password.mixed' => 'Şifreniz en az bir büyük ve bir küçük harf içermelidir.',
            'password.numbers' => 'Şifreniz en az bir rakam içermelidir.',
            'password.symbols' => 'Şifreniz en az bir özel karakter (@, $, !, vb.) içermelidir.',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Yetkili başarıyla oluşturuldu.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
        ], [
            'password.min' => 'Şifreniz en az 8 karakter olmalıdır.',
            'password.mixed' => 'Şifreniz en az bir büyük ve bir küçük harf içermelidir.',
            'password.numbers' => 'Şifreniz en az bir rakam içermelidir.',
            'password.symbols' => 'Şifreniz en az bir özel karakter (@, $, !, vb.) içermelidir.',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Yetkili bilgileri güncellendi.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users.index')->withErrors('Kendi hesabınızı silemezsiniz.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Yetkili başarıyla silindi.');
    }
}
