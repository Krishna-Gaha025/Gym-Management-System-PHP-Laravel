<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class StoreController extends Controller
{
    public function view()
    {
        $product = Products::latest()->get();
        return view('admin.store.store', ['product' => $product]);
    }

    public function show($id)
    {
        $product = Products::where('pid', $id)->first();
        return view('admin.store.viewproduct', ['product' => $product]);
    }

    public function store(Request $req)
    {
        //validate form
        $req->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        //upload images in project files
        $imageName = time() . '_p.' . $req->image->extension();
        $req->image->move(public_path('products'), $imageName);

        //-----INSERT--------------//
        $product = new Products;
        $product->pname = $req->name;
        $product->price = $req->price;
        $product->pdesc = $req->description;
        $product->pimage = $imageName;
        $product->save();
        return redirect('/admin/store')->withSuccess('Your product registered Successfully!!');
    }


    public function update(Request $req, $id)
    {
        //validate form
        $req->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $product = Products::find($id);
        if (isset($req->image)) {
            //upload images in project files
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('products'), $imageName);
            $product->pimage = $imageName;
        }
        //-----UPDATE--------------//
        $product->pname = $req['name'];
        $product->price = $req['price'];
        $product->pdesc = $req['description'];
        $product->save();
        return redirect('/admin/store')->withSuccess('Your product updated Successfully!!');
    }


    // ---------Soft Delele-------------
    public function destroy($id)
    {
        $product = Products::where('pid', $id)->first();
        $product->delete();
        return redirect('/admin/store')->withSuccess('Your product moved to Trash!!');
    }


    //---------Fetching only Trashed File-------
    public function trash()
    {
        $product = Products::latest()->onlyTrashed()->get();
        $entity = "Product";
        $data = compact('entity');
        return view('admin.trash', ['product' => $product])->with($data);
    }


    //-------Restoring Trashed file----------
    public function restore($id)
    {
        $product = Products::withTrashed()->where('pid', $id)->first();
        $product->restore();
        return redirect('/admin/trash');
    }


    //---------Permanent Delete------------
    public function forceDestroy($id)
    {
        $product = Products::withTrashed()->where('pid', $id)->first();
        $product->forceDelete();
        return redirect('/admin/trash')->withSuccess('Your product Deleted Permanantly!!');
    }
}
