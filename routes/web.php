<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ContectController;

// Route::get('profile', function () {
//     return view('admin.profile');
// });

Route::get('/', [HomeController::class, 'Home'])->name('home');
// Post
Route::get('postDeatails/{id}/{slug}', [HomeController::class, 'deatails_post'])->name('postDeatails');
Route::get('allblogPost', [HomeController::class, 'post_allblog'])->name('allblogPost');
Route::get('filtertag/{tags}', [HomeController::class, 'tag_filter'])->name('filtertag');
Route::get('filtercategory/{cate}', [HomeController::class, 'category_filter'])->name('filtercategory');
// About
Route::get('aboutpage', [HomeController::class, 'pageabout'])->name('aboutpage');
// Contect
Route::get('contactpage', [ContectController::class, 'pagecontact'])->name('contactpage');
Route::middleware('guest')->group(
    function () {
        Route::get('register', [AuthController::class, 'User_Register'])->name('register');
        Route::post('register', [AuthController::class, 'User_create']);
        Route::get('login', [AuthController::class, 'Show_login'])->name('login');
        Route::post('login', [AuthController::class, 'user_login'])->name('user_login');
        Route::get('forgetpassword', [AuthController::class, 'show_forget'])->name('forgetpassword');
        Route::post('forgetpassword', [AuthController::class, 'process_forget']);
        Route::get('resetpassword/{token}', [AuthController::class, 'reset_password'])->name('reset_password');
        Route::post('processResetPassword', [AuthController::class, 'processResetPassword'])->name('processResetPassword');

        // Post
    }
);


// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    //Users 
    Route::post('delete_user/{id}', [UserController::class, 'user_delete'])->name('delete_user');


    // Category 
    Route::post('delete_category/{id}', [CategoryController::class, 'category_delete'])->name('delete_category');

    // Post Delete
    Route::post('delete_post/{id}', [PostController::class, 'post_delete'])->name('delete_post');

});

// User routes
Route::prefix('user')->middleware(['auth', 'Moderator'])->group(function () {
    // User
    Route::get('all_user', [UserController::class, 'get_user'])->name('all_user');
    Route::get('show_Creat_User', [UserController::class, 'ShowCreatPage'])->name('show_Creat_User');
    Route::post('Creat_User', [UserController::class, 'CreateNewUser'])->name('Creat_User');
    Route::get('edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
    Route::post('update_user/{id}', [UserController::class, 'update_user'])->name('update_user');
    Route::get('filter_data', [UserController::class, 'data_filter'])->name('filter_data');
    Route::get('pdf_genator', [UserController::class, 'genator_pdf'])->name('pdf_genator');

    // Category
    Route::get('all_category', [CategoryController::class, 'get_category'])->name('all_category');
    Route::get('showCategore', [CategoryController::class, 'show_category'])->name('showCategore');
    Route::post('Create_Categore', [CategoryController::class, 'create_category'])->name('Create_Categore');
    Route::get('edit_category/{id}', [CategoryController::class, 'category_edit'])->name('edit_category');
    Route::post('update_category/{id}', [CategoryController::class, 'category_update'])->name('update_category');
    Route::get('category_filter', [CategoryController::class, 'filter_category'])->name('category_filter');
    Route::get('catagory_pdf', [CategoryController::class, 'pdf_category'])->name('catagory_pdf');

    // User Post
    Route::get('user_post', [PostController::class, 'get_postUser'])->name('user_post');

    // ========== Pendding Post ==========//
    Route::get('pendding_post', [PostController::class, 'post_pendding'])->name('pendding_post');
    Route::get('edit_panding/{id}', [PostController::class, 'panding_edit'])->name('edit_panding');
    Route::post('update_panding/{id}', [PostController::class, 'panding_update'])->name('update_panding');
    Route::post('pendding_filter', [PostController::class, 'filter_pendding'])->name('pendding_filter');
    // ========== publish Post ==========//
    Route::get('publish_post', [PostController::class, 'post_publish'])->name('publish_post');
    Route::get('edit_publish/{id}', [PostController::class, 'publish_edit'])->name('edit_publish');
    Route::post('update_publish/{id}', [PostController::class, 'publish_update'])->name('update_publish');
    Route::post('publish_filter', [PostController::class, 'filter_publish'])->name('publish_filter');

    // Commnet 
    Route::get('commnet_show', [PostController::class, 'show_commnet'])->name('commnet_show');
    Route::post('commnet_filter', [PostController::class, 'filter_commnet'])->name('commnet_filter');
    Route::post('comment_delete/{id}', [PostController::class, 'delete_commnet'])->name('comment_delete');


    // Contect
    Route::get('contect_show', [ContectController::class, 'show_contect'])->name('contect_show');
    Route::post('contect_filter', [ContectController::class, 'filter_contect'])->name('contect_filter');
    Route::post('contact_delete/{id}', [ContectController::class, 'delete_contect'])->name('contact_delete');

    Route::get('contect_reply/{id}', [ContectController::class, 'reply_contect'])->name('contect_reply');
    Route::post('contect_sents/{id}', [ContectController::class, 'sent_contects'])->name('contect_sents');
});
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'adminShow_dashboard'])->name('dashboard');

    // Post
    Route::get('Show_post', [PostController::class, 'post_show'])->name('Show_post');
    Route::post('create_post', [PostController::class, 'post_create'])->name('create_post');
    Route::get('all_post', [PostController::class, 'get_post'])->name('all_post');
    Route::get('edit_post/{id}', [PostController::class, 'post_edit'])->name('edit_post');
    Route::post('update_post/{id}', [PostController::class, 'post_update'])->name('update_post');
    Route::get('post_details/{id}', [PostController::class, 'details_post'])->name('post_details');
    Route::post('filter_post', [PostController::class, 'post_filter'])->name('filter_post');

    // Media
    Route::get('blog_media', [PostController::class, 'media_blog'])->name('blog_media');

    // Profile 
    Route::get('porfile', [ProfileController::class, 'get_profile'])->name('porfile');
    Route::post('update_profile/{id}', [ProfileController::class, 'profile_update'])->name('update_profile');
    Route::post('profilepic_update/{id}', [ProfileController::class, 'updateprofilepic'])->name('profilepic_update');

    // Comment
    Route::post('comment_submit/{id}', [HomeController::class, 'submit_comment'])->name('comment_submit');
    Route::get('comment_show/{id}', [HomeController::class, 'showcomment'])->name('comment_show');

    // Contect
    Route::post('contect_sent', [ContectController::class, 'sent_contect'])->name('contect_sent');

    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
