<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadCroppedImage(Request $request)
    {
        \Log::info('Upload request received', $request->all());
        $request->validate([
            'cropped_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $user = Auth::user();
        $image = $request->file('cropped_image');
        $imageName = $user->id . '.png'; // Use user ID as the image name and PNG format

        // Delete the old image if it exists and is not empty
        if (!empty($user->avatar)) {
            $oldImagePath = public_path('images/users/' . $user->avatar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Save the new image
        $image->move(public_path('images/users'), $imageName);

        // Update user's avatar in the database
        $user->avatar = $imageName;
        $user->save();

        return response()->json(['success' => true, 'image_url' => asset('images/users/' . $imageName)]);
    }
}
