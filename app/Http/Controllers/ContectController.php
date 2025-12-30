<?php

namespace App\Http\Controllers;

use App\Models\Contect;
use App\Mail\ContactReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContectController extends Controller
{
    public function pagecontact()
    {
        return view('contact');
    }

    // Sent Contect
    public function sent_contect(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->route('contactpage')->withInput()->withErrors($validator);
        }

        // Create a new contact
        $cont = new Contect();
        $cont->name = $request->name;
        $cont->email = $request->email;
        $cont->message = $request->message;
        $cont->save();

        // Redirect or return a response
        return redirect()->route('contactpage')->with('sent', 'Contact sent successfully');
    }

    // All Contect Shoe
    public function show_contect()
    {
        $posts = Contect::orderBy('created_at', 'DESC')
            ->paginate(8);

        return view('admin.Contect', compact('posts'));
    }

    // Contect Filter
    public function filter_contect(Request $request)
    {
        $query = Contect::query();

        // Apply filters
        if ($request->has('search_data')) {
            $searchData = $request->input('search_data');
            $query->where('name', 'like', "%$searchData%")
                ->orWhere('email', 'like', "%$searchData%")
                ->orWhere('message', 'like', "%$searchData%");
        }

        // Paginate the results
        $posts = $query->paginate(8)->appends($request->query());

        return view('admin.Contect', compact('posts'));
    }
    // Contect Delete
    public function delete_contect($id)
    {
        $cate = Contect::findOrFail($id);
        $cate->delete();

        return redirect()->route('contect_show', ['id' => $id]);
    }

    // Contact Reply 
    public function reply_contect($id)
    {
        $post = Contect::find($id);
        return view('admin.replymessage', compact('post'));
    }

    // Contact Sent 
    public function sent_contects(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'email' => 'required|email', // Ensure a valid email is passed
        ]);

        if ($validator->fails()) {
            return redirect()->route('contect_reply', ['id' => $id])->withInput()->withErrors($validator);
        }

        $user = Contect::where('email', $request->email)->first();
        $message = $request->message;
        $formdata = [
            'user' => $user,
            'mailSubject' => 'Welcome To Stand Blog.',
            'message' => $message,
        ];

        // Ensure the email exists before attempting to send
        if ($request->email) {
            Mail::to($request->email)->send(new ContactReply($formdata));

            return redirect()->route('contect_reply', ['id' => $id])->with('success', 'Reply sent successfully!');
        } else {
            return redirect()->route('contect_reply', ['id' => $id])->with('error', 'Invalid email address.');
        }
    }
}
