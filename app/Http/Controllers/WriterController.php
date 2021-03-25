<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WriterController extends Controller
{
    public function index(){
        $writer_id=Auth::guard('writer')->user()->id;
        $w=Writer::find($writer_id);
        $writer=json_decode( $w->social, TRUE );
        $posts = DB::select("select * from posts where writer_id='$writer_id'");
        return view('writer',['posts'=>$posts,'writer'=>$writer]);
    }

    public function add_post_form(){
        return view('writer.add_post');
    }
    public function add_post(Request $request){
        $file = $request->file('image');
        $filename=md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        $file->move(base_path('public/images/posts'), $filename);
        $writer_id=Auth::guard('writer')->user()->id;
        $post=new Post([
            'title'=>$request->title,
            'image'=>$filename,
            'body'=>$request->body,
            'writer_id'=>$writer_id,
        ]);
        $post->save();
        if ($post instanceof Post){
            return redirect('/writer')->with('notification','با موفقیت مطلب ثبت شد !');
        }
    }

    public function setting_writer_form($id){
        $writer=Writer::findOrfail($id);
        return view('writer.setting_writer_form',compact('writer'));
    }
    public function setting_writer(Request $request,$id){
        $writer=Writer::find($id);

        if (!$request->hasFile('profile')){
            $writer->name = $request->get('name');
            $writer->email = $request->get('email');
            $writer->save();

            if ($writer instanceof Writer){
                return redirect('/writer');
            }
        }else{
            $profile= $request->file('profile');
            $filename=md5($profile->getClientOriginalName()).'.'.$profile->getClientOriginalExtension();
            $profile->move(base_path('public/images/profile'), $filename);
            $writer->name = $request->get('name');
            $writer->email = $request->get('email');
            $writer->image = $filename;
            $writer->save();
        }

        if ($writer instanceof Writer){
            return redirect('/writer');
        }


    }

    public function content_writer($id){
        $post=Post::find($id);
        return view('writer.content_writer',compact('post'));
    }


    public function social_writer(){
        $w=Writer::find(Auth::guard('writer')->user()->id);
        $writer=json_decode( $w->social, TRUE );
        return view('writer.social_writer',compact('writer'));
    }
    public function social_writer_update(Request $request){
        $writer=Writer::findOrfail(Auth::guard('writer')->user()->id);
        $data=[
            'instagram'=>$request->instagram,
            'telegram'=>$request->telegram
        ];
        $data_json=json_encode($data);
        $writer->social=$data_json;
        $writer->save();
        return redirect('/writer')->with('notification','با موفقیت شبکه های اجتماعی شما ثبت شد. !!');
    }
    
    public function delete_post_writer($id){
        $post=Post::find($id);
        $post->delete();
        return redirect('/writer')->with('notification','مطلب با موفقیت حذف شد  !!!');
    }
}

