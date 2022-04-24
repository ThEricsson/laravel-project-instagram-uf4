<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;


class UserController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request){

        $user = Auth::user();
        $id = Auth::user()->id;

        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);

        $image_path = $request->file('avatar');

        if($image_path){

            $path = $image_path->store('users');

            $avatarname = preg_replace('/^.+[\\\\\\/]/', '', $path);

            $user->image = $avatarname;
        }

        $name=$request->input('name');
        $surname=$request->input('surname');
        $nick=$request->input('nick');
        $email=$request->input('email');

        $user->name=$name;
        $user->surname=$surname;
        $user->nick=$nick;
        $user->email=$email;

        $user->update();

        return redirect()->route('config')
                         ->with(['message'=>'Usuari actualitzat correctament']);

    }

    public function updatepass(Request $request){

        $user = Auth::user();
        $id = Auth::user()->id;

        if ($this->comrpovaAntiga($request->input('oldpass'))){
            $request->validate([
                'oldpass' => ['required'],
                'newpass' => ['required', Rules\Password::defaults()],
                'repnewpass' => ['same:newpass']
            ]);

            $user->password=Hash::make($request->newpass);

            $user->update();

            return redirect()->route('dashboard');
        }
        
        return redirect()->route('configpass')
                         ->with(['errors'=>'Contrasenya incorrecta']);
    }

    public function comrpovaAntiga($value)
    {
        $user = Auth::user();
        return Hash::check($value, $user->password);

    }


    public function getImage($filename){
        
        $file = Storage::disk('users')->get($filename);
        
        return new Response($file,200);
    }
}