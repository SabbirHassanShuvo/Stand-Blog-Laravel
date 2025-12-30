<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // Fetch Post
    public function get_post()
    {
        $posts = Post::with(['user', 'category'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
        return view('admin.post', compact('posts'));
    }

    // User All Post
    public function get_postUser()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.userPost', compact('posts'));
    }
    // Create Post
    public function post_show()
    {
        $categories = Category::where('status', 'active')->get();
        return view('admin.createpost', compact('categories'));
    }

    public function post_create(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'tags' => 'required|max:25',
            'status' => 'required|in:active,inactive',
            'category' => 'required',
            'discription' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if (!$user->hasRole('user')) {
            $validator->addRules(['publish' => 'required|in:yes,no']);
        }
        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->route('Show_post')->withInput()->withErrors($validator);
        }

        // Create a new post
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->tags = $request->tags;
        $post->status = $request->status;
        $post->category_id = $request->category;
        $post->discription = $request->discription;
        $post->publish = $user->hasRole('user') ? 'no' : $request->publish;

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/post'), $imageName);
            $post->image = $imageName;
        }

        $user->posts()->save($post);

        // Redirect or return a response
        return redirect()->route('Show_post')->with('success', 'Post created successfully');
    }

    // Edit Post
    public function post_edit($id)
    {
        $categories = Category::where('status', 'active')->get();
        $post = Post::find($id);
        return view('admin.editpost', compact('categories', 'post'));
    }

    // Update post
    public function post_update(Request $request, $id)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'tags' => 'required|max:25',
            'status' => 'required|in:active,inactive',
            'category' => 'required',
            'discription' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if (!$user->hasRole('user')) {
            $validator->addRules(['publish' => 'required|in:yes,no']);
        }

        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->route('edit_post', ['id' => $id])->withInput()->withErrors($validator);
        }

        // Create a new post
        $post =  Post::find($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->tags = $request->tags;
        $post->status = $request->status;
        $post->category_id = $request->category;
        $post->discription = $request->discription;

        $post->publish = $user->hasRole('user') ? 'no' : $request->publish;

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete Old Image
            File::delete(public_path('uploads/post'), $post->image);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/post'), $imageName);
            $post->image = $imageName;
        }

        $user->posts()->save($post);

        // Redirect or return a response
        return redirect()->route('edit_post', ['id' => $id])->with('success', 'Post Update successfully');
    }

    // Post Delete
    public function post_delete($id)
    {
        $user = Post::findOrFail($id);
        $user->delete();

        return redirect()->route('all_post', ['id' => $id]);
    }

    // Post Details
    public function details_post($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin.postdetails', compact('post', 'categories'));
    }

    // Filter Post
    public function post_filter(Request $request)
    {
        $query = Post::query();

        // Apply filters
        if ($request->has('search_data')) {
            $searchData = $request->input('search_data');
            $query->where('title', 'like', "%$searchData%")
                ->orWhere('tags', 'like', "%$searchData%")
                ->orWhere('status', 'like', "%$searchData%");
        }

        // Paginate the results
        $posts = $query->paginate(8)->appends($request->query());

        return view('admin.post', compact('posts'));
    }

    // =============================== Pendding Post ====================//
    public function post_pendding()
    {
        $posts = Post::where('publish', 'no')
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
        return view('admin.penddingpost', compact('posts'));
    }

    // Edit Pandiing Post
    public function panding_edit($id)
    {
        $post = Post::find($id);
        return view('admin.editpanding', compact('post'));
    }

    // Update Panding Post
    public function panding_update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'publish' => 'required|in:yes,no',
        ]);

        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->route('Show_post')->withInput()->withErrors($validator);
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Create a new post
        $post =  Post::find($id);
        $post->publish = $request->publish;
        $user->posts()->save($post);

        // Redirect or return a response
        return redirect()->route('pendding_post', ['id' => $id])->with('success', ' Pendding Post Update successfully');
    }

    // /Filter Pendding Post
    public function filter_pendding(Request $request)
    {
        $query = Post::query();

        // Apply filters
        if ($request->has('search_data')) {
            $searchData = $request->input('search_data');
            $query->where('title', 'like', "%$searchData%")
                ->orWhere('tags', 'like', "%$searchData%")
                ->orWhere('status', 'like', "%$searchData%");
        }

        // Paginate the results
        $posts = $query->paginate(8)->appends($request->query());

        return view('admin.penddingpost', compact('posts'));
    }

    // =============================== Published Post ====================//

    public function post_publish()
    {
        $posts = Post::where('publish', 'yes')
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
        return view('admin.postpublic', compact('posts'));
    }

    // Publish edit
    public function publish_edit($id)
    {
        $post = Post::find($id);
        return view('admin.editpublish', compact('post'));
    }

    public function publish_update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'publish' => 'required|in:yes,no',
        ]);

        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->route('Show_post')->withInput()->withErrors($validator);
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Create a new post
        $post =  Post::find($id);
        $post->publish = $request->publish;
        $user->posts()->save($post);

        // Redirect or return a response
        return redirect()->route('publish_post', ['id' => $id])->with('success', ' Pendding Post Update successfully');
    }

    public function filter_publish(Request $request)
    {
        $query = Post::query();

        // Apply filters
        if ($request->has('search_data')) {
            $searchData = $request->input('search_data');
            $query->where('title', 'like', "%$searchData%")
                ->orWhere('tags', 'like', "%$searchData%")
                ->orWhere('status', 'like', "%$searchData%");
        }

        // Paginate the results
        $posts = $query->paginate(8)->appends($request->query());

        return view('admin.postpublic', compact('posts'));
    }

    // =============== Media
    public function media_blog()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $imageCount = $posts->filter(function ($post) {
            return !empty($post->image);
        })->count();
        return view('admin.media', compact('posts', 'imageCount'));
    }

    // ================ Comment
    public function show_commnet()
    {
        $posts = Comments::orderBy('created_at', 'DESC')
            ->paginate(8);

        return view('admin.comment', compact('posts'));
    }

    // Comment filter
    public function filter_commnet(Request $request)
    {
        $query = Comments::query();

        // Apply filters
        if ($request->has('search_data')) {
            $searchData = $request->input('search_data');
            $query->where('comment', 'like', "%$searchData%");
        }

        // Paginate the results
        $posts = $query->paginate(8)->appends($request->query());

        return view('admin.comment', compact('posts'));
    }

    // Delete Comment
    public function delete_commnet($id)
    {
        $cate = Comments::findOrFail($id);
        $cate->delete();

        return redirect()->route('commnet_show', ['id' => $id]);
    }
}
