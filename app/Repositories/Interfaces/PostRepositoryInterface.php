<?php
namespace App\Repositories\Interfaces;


interface PostRepositoryInterface
{
    public function all();
    public function singlePost($id);
    public function savePost(Array $data);
    public function userPost($user_id);
    public function deletePost($post_id);
    public function updatePost($post_id,$data);


}
?>
