<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $product = new Product();
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->desc = $request->desc;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->weight = $request->weight;
        $product->condition = $request->condition;
        $product->status = $request->status;
        $product->cat_id = $request->input('category');
        $product->subcat_id = $request->subcategory;
        $product->vendor_id = auth()->user()->id;
        if ($request->hasFile('photo')) {
            $imgExt = $request->file('photo')->getClientOriginalExtension();
            $imgName = 'storage/products/' . time() . '.' . $imgExt;
            \Intervention\Image\Facades\Image::make($request->file('photo'))->resize(200,200)->save($imgName);
            $product->photo = $imgName;
        } else {
            $product->photo = 'https://via.placeholder.com/200x200.png/000022?text=autem';
        }


        $product->save();
        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index');
    }
}
