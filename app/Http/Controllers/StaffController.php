<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staffs;
use App\Models\Products;

class StaffController extends Controller
{
    public function view()
    {
        $staff = Staffs::latest()->get();
        return view('admin.staff.staff', ['staff' => $staff]);
    }

    public function show($id)
    {
        $staff = Staffs::where('sid', $id)->first();
        return view('admin.staff.viewstaff', ['staff' => $staff]);
    }

    public function store(Request $req)
    {
        //validate form
        $req->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'salary' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $imageName = time() . '_s.' . $req->image->extension();
        $req->image->move(public_path('staffs'), $imageName);
        // Insert
        $staff = new Staffs;
        $staff->sname = $req->name;
        $staff->saddress = $req->address;
        $staff->sphone = $req->phone;
        $staff->sgender = $req->gender;
        $staff->spost = $req->post;
        $staff->ssalary = $req->salary;
        $staff->simage = $imageName;
        $staff->save();
        return redirect('/admin/staff')->withSuccess('Staff Registration Successfull!!');
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required|unique:staffs',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'post' => 'required',
            'salary' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $staff = Staffs::find($id);
        if (isset($req->image)) {
            $imageName = time() . '_s.' . $req->image->extension();
            $req->image->move(public_path('staffs'), $imageName);
            $staff->simage = $imageName;
        }
        $staff->sname = $req['name'];
        $staff->saddress = $req['address'];
        $staff->sphone = $req['phone'];
        $staff->sgender = $req['gender'];
        $staff->spost = $req['post'];
        $staff->ssalary = $req['salary'];
        $staff->save();
        return redirect('/admin/staff/view/' . $id);
    }


    // ---------Soft Delele-------------
    public function destroy($id)
    {
        $product = Staffs::where('sid', $id)->first();
        $product->delete();
        return redirect('/admin/staff')->withSuccess('Moved to Trash!!');
    }


    //---------Fetching only Trashed File of both Staffs and Products Table----------
    public function trash()
    {
        $staff = Staffs::latest()->onlyTrashed()->get();
        $product = Products::latest()->onlyTrashed()->get();
        $entityS = "Staff";
        $entityP = "Product";
        $data = compact('entityS', 'entityP');
        return view('admin.trash', ['staff' => $staff, 'product'=>$product])->with($data);
    }
}
