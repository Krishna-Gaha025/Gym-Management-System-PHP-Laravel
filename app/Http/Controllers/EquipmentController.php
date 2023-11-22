<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipments;
use App\Models\Transactions;

class EquipmentController extends Controller
{
    public function view(){
        $equipment = Equipments::latest()->get();
        return view('admin.equipment.equipment', ['equipment'=>$equipment]);
    }


    public function store(Request $req)
    {
        //validate form
        $req->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'vendor' => 'required',
        ]);

        //-----INSERT--------------//
        $equipment = new Equipments;
        $equipment->ename = $req->name;
        $equipment->eprice = $req->price;
        $equipment->equantity = $req->quantity;
        $p = $req->price;
        $q = $req->quantity;
        $equipment->etotal = $p * $q;
        $equipment->evendor = $req->vendor;

        $transaction = new Transactions;
        $transaction->ttype = "expense";
        $transaction->tamount = $p * $q;
        $transaction->tdetails = "New equipment added";
        $transaction->tuser = "Admin";

        $equipment->save();
        $transaction->save();
        return redirect('/admin/equipment')->withSuccess('Equipment registered Successfully!!');
    }


    public function delete($id)
    {
        $equipment = Equipments::where('eid', $id)->first();
        $equipment->delete();
        return redirect('/admin/equipment')->withSuccess('Your product deleted successfully!!');
    }
}
