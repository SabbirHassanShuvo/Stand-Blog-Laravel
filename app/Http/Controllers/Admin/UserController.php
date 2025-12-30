<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeUserEmail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    // Fetch Data 
    public function get_user()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.user', compact('users'));
    }

    // Create User
    public function ShowCreatPage()
    {
        return view('admin.adduser');
    }

    public function CreateNewUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'user_role' => 'required|in:admin,moderator,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('show_Creat_User')->withInput()->withErrors($validator);
        }

        // Proceed with user creation logic here
        $password = Str::random(12);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'user_role' => $request->input('user_role'),
        ]);

        // You can send an email here
        $user = User::where('email', $request->email)->first();
        $formdata = [
            'user' => $user,
            'mailSubejct' => 'Welcom To Stand Blog.'
        ];
        Mail::to($request->email)->send(new WelcomeUserEmail($formdata));
        // Redirect or return a response
        return redirect()->route('show_Creat_User')->with('success', 'User created successfully. Check Email!');
    }

    // Edit user
    public function edit_user($id)
    {
        $edit_user = User::find($id);
        return view('admin.edit_user', ['user' => $edit_user]);
    }

    // Update User
    public function update_user(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'user_role' => 'required|in:admin,moderator,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit_user', ['id' => $id])
                ->withInput()
                ->withErrors($validator);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->user_role;
        $user->save();

        return redirect()->route('edit_user', ['id' => $id])->with('success', 'User updated successfully!');
    }

    // Delete User 
    public function user_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('all_user', ['id' => $id]);
    }

    // Filter User Data 
    public function data_filter(Request $request)
    {
        $query = User::query();

        // Apply filters
        if ($request->has('search_data')) {
            $searchData = $request->input('search_data');
            $query->where('name', 'like', "%$searchData%")
                ->orWhere('email', 'like', "%$searchData%")
                ->orWhere('user_role', 'like', "%$searchData%");
        }

        // Paginate the results
        $users = $query->paginate(8)->appends($request->query());

        return view('admin.user', compact('users'));
    }

    // Pdf genator
    public function genator_pdf(Request $request)
    {
        $users = User::get();

        $data = [
            'title' => 'User List',
            'date' => date('d/m/Y'),
            'users' => $users
        ];
        $pdf = Pdf::loadView('pdf.userpdf', $data);
        return $pdf->download('users.pdf');
    }
}
