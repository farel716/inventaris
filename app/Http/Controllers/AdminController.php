<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\logAdmin;
use App\Models\loginSiswa;
use App\Models\logLoginAdmin;
use App\Models\logLoginSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function tampilRegister()
    {
        return view('login.registerAdmin');
    }

    public function ambilRegister(Request $request)
    {
        $admin = new admin();
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->role = $request->role;
        $admin->save();
        return redirect('loginAdmin')->with('success', 'Anda Berhasil Register');
    }

    public function tampilLogin()
    {
        return view('login.loginAdmin');
    }

    public function ambilLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::guard('admin')->user();

            logLoginAdmin::create([
                'username' => $request->username
            ]);

            if ($user->role == 'admin') {
                $request->session()->regenerate();
                return redirect('dashboard')->with('success', 'Anda Berhasil Login');
            }
        }
        if (Auth::guard('loginSiswa')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $siswa = Auth::guard('loginSiswa')->user();

            logLoginSiswa::create([
                'nisn' => $request->username
            ]);

            if ($siswa->role == 'siswa') {
                $request->session()->regenerate();
                return redirect('tampilanSiswa')->with('success', 'Anda Berhasil Login');
            }
        } else {

            return redirect('loginAdmin')->with('error', 'Username atau Password Salah');
        }
    }

    public function logout(Request $request)
    {
        logAdmin::create([
            'admin' => (Auth::guard('admin')->user()->username),
            'aksi' => 'Telah Logout'
        ]);
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('')->with('success', 'Anda berhasil logout');
    }


    public function logoutSiswa(Request $request)
    {
        Auth::guard('loginSiswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('')->with('success', 'Anda berhasil logout');
    }
}
