<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    public function index()
    {
        return view('admin.categories.index' , [
            'categories' => $this->filter()
        ]);
    }

    public function create() {
        return view('admin.categories.create' , [
            'categories' => Category::where('parent_id' , '1')->get()
        ]);
    }

    public function store(CategoryStoreRequest $request) {

        if ($request->hasFile('photo')) {
            $imgExt = $request->file('photo')->getClientOriginalExtension();
            $imgName = 'storage/categories/' . time() . '.' . $imgExt;
            \Intervention\Image\Facades\Image::make($request->file('photo'))->resize(200,200)->save($imgName);
            $photo = $imgName;
        } else {
            $photo = 'https://via.placeholder.com/200x200.png/000022?text=autem';
        }
        DB::table('categories')->insert([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'photo' => $photo
        ]);
        return redirect()->route('categories.index');
    }



    public function edit($id) {
        return view('admin.categories.edit' , [
            'category' => Category::find($id),
            'categories' => Category::where('parent_id' , '1')->get()
        ]);
    }

    public function update(Request $request , $id){

        $category =  Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->about;
        $category->status = $request->status;
        $category->parent_id = $request->parent;
        if ($request->hasFile('photo')) {
            $imgExt = $request->file('photo')->getClientOriginalExtension();
            $imgName = 'storage/categories/' . time() . '.' . $imgExt;
            \Intervention\Image\Facades\Image::make($request->file('photo'))->resize(200,200)->save($imgName);
            $category->photo = $imgName;
        }

        $category->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id) {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }





    public function filter()
    {
        if (\request()->has('query')) {
            $query = \request()->get('query');
                return Category::where('parent_id', '!=', '1')->paginate(10);
        }
        return Category::paginate(10);

    }
}
