<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\Members;

class AuthController1 extends Controller
{
    // -----------------------------------------------------
    // --------Admin Login/Registraion Controller-----------
    // -----------------------------------------------------
    public function view(){
        return view('members.login');
    }

    public function create(){
        return view('members.register');
    }

    public function register(Request $req){
        // $req->validate([
        //     'first' => 'required',
        //     'last' => 'required',
        //     'email' => 'required|unique:members',
        //     'address' => 'required',
        //     'phone' => 'required',
        //     'gender' => 'required',
        //     'password' => [
        //         'required',
        //         Password::min(8)
        //             ->letters()
        //             ->mixedCase()
        //             ->numbers()
        //             ->symbols()
        //             ->uncompromised()],
        //     'confirmPassword' => 'required|same:password'
        // ]);

        $member = new Members;
        $member->mname = $req->first.' '.$req->last;
        $member->memail = $req->email;
        $member->maddress = $req->address;
        $member->mphone = $req->phone;
        $member->mimage = "user.png";
        $member->mgender = $req->gender;
        $member->mpassword = Hash::make($req->password);
        $member->save();
        return redirect('/')->withSuccess('Account registered Successfully');
    }

    public function epay(){
        return view('members.epay');
    }

    public function login(Request $req){
        $member = Members::where('memail','=', $req->email)->first();
        if($member){
            if(Hash::check($req->password, $member->mpassword)){
                $req->session()->put('member_id', $member->mid);
                $req->session()->put('member_name', $member->mname);
                return redirect('/home');
            }
            else{
                return redirect('/')->withError('Invalid Credentials');
            }
        }
        else{
            return redirect('/')->withError('Invalid Credentials');
        }
    }

    public function logout()
    {
        session()->forget('member_id');
        session()->forget('member_name');
        return redirect('/');
    }



    public function update(Request $req){
        $req->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $userID = session()->get('member_id');
        $member = Members::find($userID);
        if (isset($req->image)) {
            //upload images in project files
            $imageName = time() . '_m.' . $req->image->extension();
            $req->image->move(public_path('members'), $imageName);
            $member->mimage = $imageName;
        }
        //-----UPDATE--------------//
        $member->mname = $req['name'];
        $member->maddress = $req['address'];
        $member->mphone = $req['phone'];
        $member->save();
        return redirect('/home/profile/'.$userID);
    }
}
