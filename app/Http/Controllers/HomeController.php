<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::with('user') // Eager load the user relationship
            ->orderBy('created_at', 'DESC')
            ->take(5)
            ->get();

        $category = Category::orderBy('created_at', 'DESC')->get();


        return view('index', compact('posts', 'category'));
    }

    public function deatails_post($id)
    {
        $post = Post::find($id);
        $category = Category::all();

        $posts = Post::with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('postsdetails', compact('post', 'category', 'posts'));
    }

    public function post_allblog()
    {
        $posts = Post::with('user') // Eager load the user relationship
            ->orderBy('created_at', 'DESC')->paginate(6);

        $category = Category::orderBy('created_at', 'DESC')->get();


        return view('blog', compact('posts', 'category'));
    }

    // Filter tag
    public function tag_filter($tags)
    {
        // Filter posts by the tag
        $posts = Post::where('tags', 'LIKE', '%' . $tags . '%')
            ->orderBy('created_at', 'DESC');
        return view('blog', compact('posts'));
    }
    // Filter tag
    public function category_filter($cate)
    {
        // Retrieve the category by its ID
        $categorys = Category::with('posts')->findOrFail($cate);

        // Get all categories to display in the view
        $category = Category::all();

        // Get the posts associated with the selected category
        $posts = $categorys->posts()->orderBy('created_at', 'DESC')->paginate(6);

        // Pass the posts and categories to the view
        return view('blog', compact('posts', 'categorys', 'category'));
    }

    // About 
    public function pageabout()
    {
        return view('about');
    }
    // Comment
    public function submit_comment(Request $request, $id)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Validate the request
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        // Create a new comment and associate it with the user
        $comment = new Comments();
        $comment->comment = $request->comment;
        $comment->post_id = $id; // or $request->blog_id

        $user->comments()->save($comment);

        // Redirect to the post details route with the post id
        return redirect()->back()->with('success');
    }
    public function showcomment($id)
    {
        // Fetch the post with comments, user, and profile information
        $post = Post::with('comments.user.profile')->findOrFail($id);

        // Pass the post and commentsCount to the view
        return view('postsdetails', compact('post'));
    }
}
