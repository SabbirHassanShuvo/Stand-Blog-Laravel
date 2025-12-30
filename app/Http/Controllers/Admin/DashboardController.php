<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function adminShow_dashboard()
    {
        $totalUsers = User::count();

        // Count total posts
        $totalPosts = Post::count();

        // Count total categories
        $totalCategories = Category::count();

        // Count pending posts
        $pendingPosts = Post::where('publish', 'no')->count();

        // Count public posts
        $publicPosts = Post::where('publish', 'yes')->count();

        // Get the logged-in user
        $user = Auth::user();

        // Total posts by the user
        $totalUserPosts = $user->posts()->count();

        // Pending posts by the user
        $pendingUserPosts = $user->posts()->where('publish', 'no')->count();

        // Published posts by the user
        $publishedUserPosts = $user->posts()->where('publish', 'yes')->count();

        // Fetch own posts by user
        $userPosts = $user->posts()->paginate(7);

        return view('admin.index', compact('totalUsers', 'totalPosts', 'totalCategories', 'pendingPosts', 'publicPosts', 'totalUserPosts', 'pendingUserPosts', 'publishedUserPosts', 'userPosts'));
    }
}
