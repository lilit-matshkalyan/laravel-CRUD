<?php

namespace App\Http\Controllers;
use IlluminateHttpRequest;
use AppPost;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Auth;
use Form;
use App\Post;




class PostController extends Controller
{
    public function index(Request $request)
    {
        /*$request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));*/

        $request->session()->put('field', $request
            ->has('field') ? $request->get('field') : ($request->session()
            ->has('field') ? $request->session()->get('field') : 'title'));

        $request->session()->put('sort', $request
            ->has('sort') ? $request->get('sort') : ($request->session()
            ->has('sort') ? $request->session()->get('sort') : 'asc'));

        $posts = new Post();
        $posts = $posts->where('title', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);
        if ($request->ajax()) {
            return view('posts.index', compact('posts'));
        } else {
            return view('posts.ajax', compact('posts'));
        }
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('posts.form');

        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json([
                'fail' =>true,
                'errors' => $validator->errors()
            ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('posts')
        ]);
    }

    public function show(Request $request, $id)
    {
        if($request->isMethod('get')) {
            return view('posts.detail',['post' => Post::find($id)]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('posts.form',['post' => Post::find($id)]);

        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json([
                'fail' =>true,
                'errors' => $validator->errors()
            ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('posts')
        ]);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('posts');
    }
}