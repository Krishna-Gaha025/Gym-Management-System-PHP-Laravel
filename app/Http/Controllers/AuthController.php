<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // -----------------------------------------------------
    // ------------------Admin Login Controller-------------
    // -----------------------------------------------------
    public function view()
    {
        return view('admin.login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'password'=>'required'
        ]);

        $admin = Admin::where('aname','=', $req->name)->first();
        if($admin){
            if(Hash::check($req->password, $admin->apassword)){
                $req->session()->put('name', $admin->aname);
                return redirect('/admin');
            }
            else{
                return redirect('/admin/login')->withError('Invalid Credentials');
            }
        }
        else{
            return redirect('/admin/login')->withError('Invalid Credentials');
        }
    }

    public function logout()
    {
        session()->forget('name');
        session()->forget('pass');
        return redirect('/admin/login');
    }

}

