<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banners.index' , [
            'banners' => Banner::all()
        ]);
    }



    public function create() {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->slug = $request->slug;
        $banner->desc = $request->desc;
        $banner->status = $request->status;
        if ($request->hasFile('photo')) {
            $imgExt = $request->file('photo')->getClientOriginalExtension();
            $imgName = 'storage/banners/' . time() . '.' . $imgExt;
            \Intervention\Image\Facades\Image::make($request->file('photo'))->save($imgName);
            $banner->photo = $imgName;
        } else {
            $banner->photo = 'https://via.placeholder.com/1170x500.png/000022?text=autem';
        }


        $banner->save();
        return redirect()->route('banners.index');
    }


    public function edit($id) {
        return view('admin.banners.edit' , [
            'banner' => Banner::findOrFail($id)
        ]);
    }

    public function update($id , Request $request) {
        $banner = Banner::findOrFail($id);
        $banner->title = $request->title;
        $banner->slug = $request->slug;
        $banner->desc = $request->desc;
        $banner->status = $request->status;
        if ($request->hasFile('photo')) {
            $imgExt = $request->file('photo')->getClientOriginalExtension();
            $imgName = 'storage/categories/' . time() . '.' . $imgExt;
            \Intervention\Image\Facades\Image::make($request->file('photo'))->resize(200,200)->save($imgName);
            $banner->photo = $imgName;
        }

        $banner->save();

        return redirect()->route('banners.index');
    }

    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect()->route('banners.index');
    }


}
