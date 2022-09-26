<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserProfile;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::get();
    }

    public function getProfile($id)
    {
        return UserProfile::where('User_id' , $id)->get();
    }

    public function storeProfile(Array $data)
    {
        UserProfile::create($data);
    }
    public function singleUser($id)
    {
        return User::where('id', $id)->get();
    }
    public function editProfile($id)
    {
        return User::find($id);

    }
    public function updateProfile($user_id , Array $data)
    {
        UserProfile::where('user_id', $user_id)->update($data);

        // $UserProfile = UserProfile::where('user_id', $user_id)->get();
        // $UserProfile->birth_date = $data['birth_date'];
        // $UserProfile->address = $data['address'];
        // $UserProfile->gender = $data['gender'];
        // $UserProfile->profile_photo = $data['profile_photo'];
        // // dd($UserProfile);

        // return $UserProfile->save();
        // UserProfile::where('user_id', $user_id)->update($UserProfile);
    }
}

?>
