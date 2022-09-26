<?php
namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    public function all();
    public function storeProfile(Array $data);
    public function getProfile($id);
    public function singleUser($id);
    public function editProfile($id);
    public function updateProfile($user_id , Array $data);
}
?>
