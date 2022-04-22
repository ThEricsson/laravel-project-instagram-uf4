<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

use App\Models\Image;


class ImageController extends Controller{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

        $user = Auth::user();
        $id = Auth::user()->id;

        $request->validate([
            'image' => ['required','image','mimes:jpg,png,jpeg,gif'],
            'descripcio' => ['required', 'string', 'max:255']
        ]);

        $image_path = $request->file('avatar');

        if($image_path){

            $path = $image_path->store('users');

            $imagepath = preg_replace('/^.+[\\\\\\/]/', '', $path);
        }

        $image = Image::create([
            'user_id' => $user->id,
            'image_path' => $imagepath,
            'description' => $request->descripcio,
        ]);

        return redirect()->route('dashboard')
                         ->with([]);
    }

}