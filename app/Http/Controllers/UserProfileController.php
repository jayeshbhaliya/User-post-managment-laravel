<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * UserRepository
     *
     * @var mixed
     */
    private $UserRepository;

    /**
     * __construct
     *
     * @param  mixed $UserRepository
     * @return void
     */
    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }
    /**
     * get all users
     *
     * @return void
     */
    public function users()
    {
        $users = $this->UserRepository->all();
        return view('alluser', compact('users'));
    }
    /**
     * get view for save profile data
     *
     * @param  mixed $request
     * @return void
     */
    public function addProfile($id)
    {
        $user = $this->UserRepository->singleUser($id);
        return view('edit',compact([ 'user']));
    }
    /**
     * get user Profile
     *
     * @return void
     */
    public function myProfile()
    {
        $id = Auth::id();
        $user = $this->UserRepository->singleUser($id);
        return view('profile', compact([ 'user']));
    }
    /**
     * save new Profile data
     *
     * @return void
     */
    public function saveProfile(Request $request)
    {
        $request->validate([
            'user_id' => 'numeric',
            'gender' => 'required|string',
            'address' => 'required|max:200|min:4',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500000',
            'birth_date' => 'required|date',
        ]);
        $data = $request->all();
        if ($image = $request->file('profile_photo')) {
            $name = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['profile_photo'] = "$name";
        }
        $this->UserRepository->storeProfile($data);
        return redirect('/profile');
    }
    /**
     * editProfile
     *
     * @param  mixed $id
     * @return void
     */
    public function editProfile($id)
    {
        $user = $this->UserRepository->editProfile($id);
        dd($user);
        return view('edit')->with('user',$user);
    }
    /**
     * updateProfile
     *
     * @param  mixed $request
     * @return void
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'user_id' => 'numeric',
            'gender' => 'required|string',
            'address' => 'required|max:200|min:4',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birth_date' => 'required|date',
        ]);
        $data=[];
        $data['gender'] = $request->input('gender');
        $data['address'] = $request->input('address');
        $data['birth_date'] = $request->input('birth_date');
        if ($image = $request->file('profile_photo')) {
            $name = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['profile_photo'] = $name;
        }
        $user_id = $request->user_id;
        $this->UserRepository->updateProfile($user_id ,$data);
        return redirect('/profile');
    }
}
