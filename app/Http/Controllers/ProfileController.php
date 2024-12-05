<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\FavouriteCars;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
        // return redirect()->route('profile.edit')->with('success','Profile updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        $user_favourite_cars = FavouriteCars::where('user_id', $user->id)->get();
        foreach($user_favourite_cars as $user_favourite_car){
            $user_favourite_car->delete();
        }

        $cars = $user->cars;
        foreach($cars as $car){
            $images = $car->images;
            foreach($images as $image){
                $file_path = public_path().'/images/'.$image->name;
                File::delete($file_path);
            }
            $car->images()->delete();
            $car->carFeature()->delete();
            $favourite_cars = FavouriteCars::where('car_id', $car->id)->get();
            foreach($favourite_cars as $favourite_car){
                $favourite_car->delete();
            }
            $car->delete();
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
