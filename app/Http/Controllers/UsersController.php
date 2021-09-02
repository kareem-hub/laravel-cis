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

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function store()
    {
        if (empty(request('id'))) {
            return redirect('/create')->with('msg', 'Id cannot be empty');
        }

        if (empty(request('name'))) {
            return redirect('/create')->with('msg', 'Name cannot be empty');
        }

        if (request('id') < 0) {
            return redirect('/create')->with('msg', 'invalid id');
        }

        if (strlen(request('name')) < 2) {
            return redirect('/create')->with('msg', 'invalid name');
        }

        if (User::where('id', request('id'))->exists()) {
            return redirect('/create')->with('msg', 'id is already taken');
        }

        if (!request('postType')) {
            User::create(request()->all());
            return redirect('/create')->with('msg', 'New user created successfully');
        } else {
            if (strlen(request('postType')) > 2) {
                if (is_numeric(request('postType'))) {
                    return redirect('/create')->with('msg', 'post type cannot be numeric');
                } else {
                    User::create(request()->all());
                    Post::create(['user_id' => request('id'), 'user_post_type' => request('postType')]);
                    return redirect('/create')->with('msg', 'New user with post created successfully');
                }
            } else {
                return redirect('/create')->with('msg', 'post type cannot be less than 2 characterss');
            }
        }

        User::find(request('id'))->notify(new NewUserNotification());

        return redirect('/create')->with('msg', 'Something bad happend');
    }
}
