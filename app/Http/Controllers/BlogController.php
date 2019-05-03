<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
   
    public function getData()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        return response()->json([
            'blogs'    => $blogs,
        ], 200);
    }
    public function singlePost($id){
        $post = Blog::where('id',$id)->get();
        return response()->json([
            'post'    => $post,
            'message' => 'Success'
        ], 200);

    }
    public function addPost(Request $request)
    {
         $this->validate($request, [
            'title'        => 'required|max:255',
            'description' => 'required',
            'file' => 'required|mimes:jpeg,png'
        ]);
        $file = $request->file('file');

        $input['filename'] = time().'.'.$file->getClientOriginalName();

        $destinationPath = public_path('/images');

        $file->move($destinationPath, $input['filename']);
        
        $post = Blog::create([
            'title'        => request('title'),
            'description' => request('description'),
            'image'=> $input['filename'],
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        
        return response()->json([
            'post'    => $post,
            'message' => 'Success'
        ], 200);
    }
    public function getEditData($id){
        $post = Blog::where('id',$id)->get();
        return response()->json([
            'post'    => $post,
            'message' => 'Success'
        ], 200);

    }
    public function update(Request $request,$id)
    {
        
        $validator = Validator::make($request->all(), [
            'title'        => 'required|max:255',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['isvalid'=>false,'errors'=>$validator->messages()]);
        }
        $post = Blog::where('id',$id)->update(['title'=>$request->title,'description'=>$request->description]);
        
        
        if($request->file('file')){
            $validator = Validator::make($request->all(), [
                'file' => 'mimes:jpeg,png',
            
            ]);
            if ($validator->fails()) {
                return response()->json(['isvalid'=>false,'errors'=>$validator->messages()]);
            }

            $file = $request->file('file');
            $input['filename'] = time().'.'.$file->getClientOriginalName();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $input['filename']);
            $post = Blog::where('id',$id)->update(['image'=> $input['filename'],'updated_at'=>date('Y-m-d H:i:s')]);
            return response()->json(['post'    => $post,'message' => 'Success'], 200);
        }
      
        return response()->json([
            'post'    => $post,
            'message' => 'Success'
        ], 200);
    }
    public function destroy($id)
    {   
        $post = Blog::select('image')->where('id',$id)->get();
        unlink(public_path('images/'.$post[0]->image));
        $post = Blog::find($id)->delete();
        return response()->json([
            'post'    => $post,
            'message' => 'Success'
        ], 200);
    }
}
