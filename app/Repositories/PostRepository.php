<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Post;

use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::all();
    }
    public function singlePost($id)
    {
        return Post::where('id',$id)->first();
    }
    public function savePost($data)
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->user_id = $data['user_id'];
        $post->desc = $data['desc'];
        $post->post_icon = $data['post_icon'];
        return $post->save();
    }
    public function userPost($user_id)
    {
        return Post::where('user_id',$user_id)->get();
    }
    public function deletePost($post_id)
    {
        $post =Post::where('id',$post_id)->first();
        $post->delete();
        // $post = User::find($post_id)->first();
        // $post->delete();
    }
    public function updatePost($post_id,$data){
        $post = Post::find($post_id);
        $post->title = $data['title'];
        $post->user_id = $data['user_id'];
        $post->desc = $data['desc'];
        $post->post_icon = $data['post_icon'];
        return $post->save();
    }
}
?>
