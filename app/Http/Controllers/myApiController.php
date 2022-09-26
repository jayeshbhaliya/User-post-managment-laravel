<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class myApiController extends Controller
{
    public function getPost()
    {
        return Post::all();
    }
    public function listdata($data)
    {
        $data = Post::where('id', $data)
            ->orWhere('title', 'like', '%' . $data . '%')
            ->orWhere('desc', 'like', '%' . $data . '%')->get();
        if (!empty($data)) {
            return $data;
        } else {
            $obj = "This Data Not in the Table Sorry !!";
            return $obj;
        }
    }
    public function update(Request $request)
    {
        $rules = array([
            "title" => "require|min:3",
            "desc" => "require|min:3",
        ]);
        $validater = validator($request->all(), $rules);
        if ($validater->fails()) {
            return $validater->errors();
        } else {
            $post = Post::find($request->id);
            $post->title = $request->title;
            $post->desc = $request->desc;
            $result = $post->save();

            if ($result) {
                return "data has been updated";
            } else {
                return "data has been not updated";

            }
        }
    }
}
