<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadCroppedImage(Request $request)
    {
        $request->validate([
            'cropped_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $image = $request->file('cropped_image');
        $imageName = $user->id . '_' . time() . '.png'; // Append timestamp for uniqueness

        // Delete the old image if it exists
        if (!empty($user->avatar)) {
            $oldImagePath = public_path('images/users/' . $user->avatar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Save the new image to the public directory
        $image->move(public_path('images/users'), $imageName);

        // Update the user's avatar path in the database
        $user->avatar = $imageName;
        $user->save();

        // Return a response with the HTTPS URL
        return response()->json(['success' => true, 'image_url' => asset('images/users/' . $imageName)]);
    }
}
