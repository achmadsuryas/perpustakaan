<?php

namespace App\Http\Controllers;

use App\Models\T_admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login-user', [
            'title' => 'Perpustakaan | Masuk User'
        ]);
    }

    public function index2()
    {
        return view('login-admin-pustakawan', [
            'title' => 'Perpustakaan | Masuk Admin/Pustakawan'
        ]);
    }

    public function loginAnggota(Request $request)
    {
        $request->validate([
            'f_username' => 'required',
            'f_password' => 'required',
        ]);

        if (Auth::guard('user')->attempt(['f_username' => $request->f_username, 'password' => $request->f_password])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        } else {
            return back()->with('errorLogin', 'Username Atau Password anda salah!!!');
        }
    }

    public function LoginAdminPustakawan(Request $request)
    {
        $request->validate([
            'f_username' => 'required',
            'f_password' => 'required',
        ]);

        $pustakawan = T_admin::firstWhere('f_username', $request->f_username);

        if (Auth::guard('admin')->attempt(['f_username' => $request->f_username, 'password' => $request->f_password])) {
            if ($pustakawan->f_status != "Aktif") {
                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();
                return redirect()->back()->with('errorLogin', 'Status Akun Tidak Aktif!!!');
            } else {
                $request->session()->regenerate();
                return redirect('/dashboard');
            }
        } else {
            return redirect()->back()->with('errorLogin', 'Username Atau Password anda salah!!!');
        }
    }

    public function logoutAction(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
