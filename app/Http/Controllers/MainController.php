<?php

namespace App\Http\Controllers;

use App\Models\newPost;
use App\Models\newUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function home()
    {
        $user = newUser::find(session('user_id'));
        $user_posts = $user->posts;
        return view('home', ['posts' => $user_posts]);
    }
    public function authorization()
    {
        return view('authorization');
    }
    public function about()
    {
        return view('about');
    }
    public function registration()
    {
        return view('registration');
    }
    public function otherPosts()
    {
        $allPosts = newPost::all();
        return view('otherPosts', ['posts' => $allPosts]);
    }
    public function addPost()
    {
        return view('addPost');
    }
    public function auth(Request $request)
    {
        $user_login = $request->input('login');
        $user_password = $request->input('password');
        $users = newUser::all();

        foreach ($users as $user) {
            $login = $user->login;
            $password = $user->password;
            if ($login == $user_login && password_verify($user_password, $password)) {
                session(['user_id' => $user->id]);
                return redirect()->route('home');
            }
        }
        return 'User not found';
    }
    public function newPost(Request $request)
    {
        $user = newUser::find(session('user_id'));
        $post = new newPost;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category = $request->input('categorySelect');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public/images');
            $url = Storage::url($path);
            $post->image = $url;
        }
        $user->posts()->save($post);
        return redirect()->route('home');
    }
    public function newUser(Request $request)
    {
        $valid = $request->validate([
            'login' => 'required|min:4|max:100',
            'password' => 'required|min:6|max:100',
            'yourName' => 'required',
        ]);
        $isUserExist = false;
        $users = newUser::all();
        $user_login = $request->input('login');
        foreach ($users as $user) {
            $login = $user->login;
            if ($login == $user_login) {
                $isUserExist = true;
                break;
            }
        }
        if (!$isUserExist) {
            $user = new newUser();
            $user->name = $request->input('yourName');
            $user->login = $request->input('login');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            $userId = $user->id;
            session(['user_id' => $userId]);
            return redirect()->route('home');
        } else {
            return 'Такий користувач уже існує';
        }
    }
    public function searchPost(Request $request)
    {
        $searchTitle = $request->input('search');
        $blogs = newPost::where('title', $searchTitle)->get();
        return view('otherPosts', ['posts' => $blogs]);
    }
}