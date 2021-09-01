<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show()
    {
        $users = DB::table('users')
            ->leftjoin('posts', 'users.id', '=', 'posts.user_id')
            ->select('users.*', 'posts.user_post_type')
            ->get();

        return view('show', ['users' => $users]);
    }


    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $newUser = new User();
        $newPost = new Post();

        $newUser->id = request('id');
        $newUser->name = request('name');
        $newPost->user_id = request('id');
        $newPost->user_post_type = request('postType');

        if (empty(request('id')) or empty(request('name'))) {
            return redirect('/create')->with('msg', 'Id or name cannot be empty');
        }

        if (request('id') < 0 or strlen(request('name')) < 2) {
            return redirect('/create')->with('msg', 'invalid id or name');
        }

        if (User::where('id', request('id'))->exists()) {
            return redirect('/create')->with('msg', 'id is already taken');
        } else {
            $newUser->save();
            if ($newPost->user_post_type) {
                $newPost->save();
            }
            User::find(request('id'))->notify(new NewUserNotification());
            return redirect('/create')->with('msg', 'New user created successfully');
        }
    }
}
