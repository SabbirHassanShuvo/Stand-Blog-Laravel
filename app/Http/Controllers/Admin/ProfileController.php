<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function get_profile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }
    public function profile_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:25',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('porfile', ['id' => $id])->withInput()->withErrors($validator);
        }

        $user = User::find($id);
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('porfile')->with('success', 'Profile Update successfully');
    }
    public function updateprofilepic(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'banner_image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile', ['id' => $id])->withInput()->withErrors($validator);
        }

        // Find the profile by user id or profile id
        $user = Auth::user();
        $profile = $user->profile; // Assuming a one-to-one relationship

        if ($request->hasFile('banner_image')) {
            // Delete Old Image if it exists
            if ($profile && $profile->profile_banner) {
                $oldImagePath = public_path('uploads/profile/' . $profile->profile_banner);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Store the new image
            $image = $request->file('banner_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile/'), $imageName);

            // Update profile with the new image name
            if ($profile) {
                $profile->profile_banner = $imageName;
                $user->profile()->save($profile);
            } else {
                // If no profile exists for the user, create a new one
                $profile = new Profile();
                $profile->profile_banner = $imageName;
                $user->profile()->save($profile);
            }
        }

        return redirect()->route('porfile', ['id' => $id])->with('done', 'Profile Picture Updated Successfully');
    }
}
