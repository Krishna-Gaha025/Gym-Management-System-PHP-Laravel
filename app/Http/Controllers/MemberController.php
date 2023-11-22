<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Transactions;
use App\Models\Members;
use App\Models\Advertisements;
use App\Models\Staffs;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $product = Products::latest()->get();
        $advertisement = Advertisements::get();
        $staff = Staffs::get()->where('spost', '=', 'Trainer');
        return view('members.home', ['product' => $product, 'advertisement' => $advertisement, 'staff' => $staff]);
    }


    public function view($id)
    {
        $product = Products::where('pid', $id)->first();
        return view('members.viewproduct', ['product' => $product]);
    }


    public function buy(Request $req, $id)
    {
        $user = session('member_name');
        $data = $req->product;

        $member = Members::get('mname')->where('mname', $user)->first();
        $name = trim($member, '{:"}');
        $username = substr($name, 8);

        $transaction = new Transactions;
        $transaction->ttype = "income";
        $transaction->tamount = $data;
        $transaction->tdetails = "Product Sold";
        $transaction->tuser = $username;
        $transaction->save();
        return redirect('/home/view/' . $id)->withSuccess('Product bought successfully');
    }


    public function profile($id)
    {
        $member = Members::get()->where('mid', $id)->first();
        return view('members.profile', ['member' => $member]);
    }


    public function hire($id){
        $staff = Staffs::find($id);
        $staff->status = "Requested";
        $staff->save();
        return redirect('/home');
    }

    public function cancelHire($id){
        $staff = Staffs::find($id);
        $staff->status = "";
        $staff->save();
        return redirect('/home');
    }
}
