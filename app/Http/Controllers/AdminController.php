<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $writers=Writer::all();
        $admins=Admin::all();
        return view('admin',compact('admins','writers'));
    }
    public function delete_writer($id){
        $user=Writer::findOrfail($id);
        $user->delete();
        return back();
    }
    public function add_writer_form(){
        return view('admin.add_user_form');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function add_writer(Request $request){
        $this->validator($request->all())->validate();
        $admin = Writer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/admin');
    }
    public function add_writer_to_admin($id){

        $writer=Writer::findOrfail($id);
        $ad=Admin::where('email', '=', $writer->email)->first();
        if ($ad instanceof Admin){
            return redirect('/admin/admins-list')->with('notification','این کاربر قبلا به عنوان ادمین انتخاب شده است . !!!');
        }
        $admin= new Admin();
        $admin->name=$writer->name;
        $admin->email=$writer->email;
        $admin->password=$writer->password;
        $admin->save();

        return redirect('/admin/admins-list');
    }
    public function admins_list(){
        $admins=Admin::all();
        return view('admin.admins_list',compact('admins'));
    }
    public function delete_admin($id){
        $admin=Admin::findOrfail($id);
        $admin->delete();
        return redirect()->back();
    }
    public function content_admin(){
        $posts=Post::all();
        return view('admin.content_admin',compact('posts'));
    }
    public function setting_amdin(){
        $admin=Auth::guard('admin')->user();
       return view('admin.setting_admin',compact('admin'));
    }
    public function setting_amdin_update(Request $request){
        $admin_id=Auth::guard('admin')->user()->id;
        $admin=Admin::find($admin_id);
        if (!$request->hasFile('profile')){
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->save();

            if ($admin instanceof Admin){
                return redirect('/admin');
            }
        }else{
            $profile= $request->file('profile');
            $filename=md5($profile->getClientOriginalName()).'.'.$profile->getClientOriginalExtension();
            $profile->move(base_path('public/images/profile'), $filename);
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->image = $filename;
            $admin->save();
        }

        if ($admin instanceof Admin){
            return redirect('/admin');
        }
    }

    public function delete_content_writer($id){
        $post=Post::findOrfail($id);
        $post->delete();
        return redirect('/admin/posts')->with('notification','نوشته با موفقیت حذف شد !!');

    }

}
