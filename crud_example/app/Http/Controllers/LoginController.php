<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function loginproses(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->isAdmin()) {
                return redirect('/dashboard');
            } else {
                return redirect('/tambahserviceuser');
            }
        }
        return redirect('login')->withErrors(['password' => 'Wrong password']);
    }

    public function register()
    {
        return view('register');
    }
    public function registeruser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'notelpon' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'notelpon' => $request->notelpon,
            'role' => 'user',
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return  redirect('login');
    }
    public function tampilkanuser($id)
    {
        $data = User::find($id);
        return view('tampilkanuser', compact('data'));
    }
    public function updateuser(Request $request, $id)
    {
        try {
            // Cari user berdasarkan ID
            $data = User::findOrFail($id);

            // Update data user dengan input dari request
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'notelpon' => $request->notelpon,
            ]);

            // Cek apakah user yang sedang login adalah admin
            if (Auth::user()->isAdmin()) {
                // Redirect ke dashboard jika user adalah admin
                return redirect('/dashboard')->with('success', 'Data berhasil diupdate!');
            } else {
                // Redirect ke halaman tambah service user jika user bukan admin
                return redirect('/tambahserviceuser')->with('success', 'Data berhasil diupdate!');
            }
        } catch (\Exception $e) {
            // Tangkap error dan tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
