<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisements;

class AdvertisementController extends Controller
{
    public function view()
    {
        $advertisement = Advertisements::get();
        return view('admin.advertisement.advertisement', ['advertisement' => $advertisement]);
    }

    public function store(Request $req)
    {
        //validate form
        $req->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        //upload images in project files
        $imageName = time() . '_ad.' . $req->image->extension();
        $req->image->move(public_path('advertisement'), $imageName);

        //-----INSERT--------------//
        $advertisement = new Advertisements;
        $advertisement->ad_image = $imageName;
        $advertisement->save();
        return redirect('/admin/advertisement');
    }
}
