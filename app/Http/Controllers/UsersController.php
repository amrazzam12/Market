<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Intervention\Image\Image;

class UsersController extends Controller
{
    public function index() {
        return view('admin.users.index' , [
            'users' => $this->filter()
        ]);
    }
    public function create() {
        return view('admin.users.create');
    }

    public function store(UserStoreRequest $request) {

        $request->validated();
       $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
        if ($request->hasFile('photo')) {
            $imgExt = $request->file('photo')->getClientOriginalExtension();
            $imgName = 'storage/users/' . time() . '.' . $imgExt;
            \Intervention\Image\Facades\Image::make($request->file('photo'))->resize(200,200)->save($imgName);
            $user->photo = $imgName;
        } else {
            $user->photo = 'https://via.placeholder.com/200x200.png/000022?text=autem';
        }
            $user->save();
        return redirect()->route('users.index');
    }



    public function edit($id) {
        return view('admin.users.edit' , [
            'user' => User::find($id)
        ]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email' , [Rule::unique('users' , 'email')->ignore($id)],
            'role' => 'required|in:admin,customer,vendor'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->hasFile('photo')) {
            $imgExt = $request->file('photo')->getClientOriginalExtension();
            $imgName = 'storage/users/' . time() . '.' . $imgExt;
            \Intervention\Image\Facades\Image::make($request->file('photo'))->resize(200,200)->save($imgName);
            $user->photo = $imgName;
        }
        $user->save();
        return redirect()->route('users.index');
    }


    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }


    public function filter()
    {
        if (\request()->has('query')) {
            $query = \request()->get('query');
            switch ($query) {
                case 'admins':
                    return User::where('role', 'admin')->paginate(10);
                case 'vendors':
                    return User::where('role', 'vendor')->paginate(10);
                case 'customers':
                    return User::where('role', 'customer')->paginate(10);
                default:
                    return User::paginate(10);
            }
        }

        return User::paginate(5);


    }



}
