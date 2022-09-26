<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    private $PostRepository;

    /**
     * @param PostRepositoryInterface $PostRepository
     */
    public function __construct(PostRepositoryInterface $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = $this->PostRepository->all();
        return view('home')->with('posts', $posts);
    }
    public function createPost()
    {
        return view('createPost');
    }
    public function savePost(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required|string|min:3|max:30',
            'desc'  => 'required|string|min:10|max:200',
            'post_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if ($image = $request->file('post_icon')) {
            $name = time() . '-' . $image->getClientOriginalName();
            Storage::disk('public')->put($name, file_get_contents($image));
            $data['post_icon'] = "$name";
        }
        else
        {
            $data['post_icon'] = null;
        }
        $this->PostRepository->savePost($data);
        return redirect('/')->with('massage','add successful');
    }
    public function mypost()
    {
        $user_id = Auth::user()->id;
        $posts = $this->PostRepository->userPost($user_id);
        return view('mypost')->with('posts',$posts);
    }
    public function editPost($id)
    {
        $posts = $this->PostRepository->singlePost($id);
        // dd($posts);
        return view('edit-post')->with('posts',$posts);
    }
    public function updatePost(Request $request)
    {
        $post_id = $request->input('id');
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required|string|min:3|max:30',
            'desc'  => 'required|string|min:10|max:200',
            'post_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if ($image = $request->file('post_icon')) {
            $name = time() . '-' . $image->getClientOriginalName();
            Storage::disk('public')->put($name, file_get_contents($image));
            $data['post_icon'] = "$name";
        }
        else
        {
            $data['post_icon'] = null;
        }
        $this->PostRepository->updatePost($post_id,$data);
        return redirect('/mypost')->with('massage','add succsessfull');
    }
    public function deletePost($id)
    {
        $this->PostRepository->deletePost($id);
        return back()->with('massage','Post deleted succsessfully!');
    }

}
