<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index' , [
            'products' => Product::all()
        ]);
    }


    public function create()
    {
        return view('admin.products.create' , [
            'categories' => Category::where('parent_id' , '=' , '1')->get(),
            'subcategories' => Category::where('parent_id' , '!=' , '1')->get(),
        ]);
    }


    public function store(ProductStoreRequest $request)
    {

        if ($request->hasFile('photo')) {
            $imgExt = $request->file('photo')->getClientOriginalExtension();
            $imgName = 'storage/products/' . time() . '.' . $imgExt;
            \Intervention\Image\Facades\Image::make($request->file('photo'))->resize(800,800)->save($imgName);
            $photo = $imgName;
        } else {
            $photo = 'https://via.placeholder.com/200x200.png/000022?text=autem';
        }
        DB::table('products')->insert([
            'title' => $request->title,
            'slug' => $request->slug,
            'desc' => $request->desc,
            'stock' => $request->stock,
            'price' => $request->price,
            'sale' => $request->sale,
            'weight' => $request->weight,
            'condition' => $request->condition,
            'status' => $request->status,
            'cat_id' => $request->input('category'),
            'subcat_id' => $request->subcategory,
            'vendor_id' => auth()->user()->id,
            'photo' => $photo
        ]);
        return redirect()->route('products.index');
    }

    public function edit($id) {
        return view('admin.products.edit' , [
            'product' => Product::find($id),
            'categories' => Category::where('parent_id' , '1')->get(),
            'subCategories' => Category::query()->where('parent_id' , '!=' , '1')
        ]);
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index');
    }
}
