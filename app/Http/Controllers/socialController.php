<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Socialite;
use Redirect;
class socialController extends Controller
{
    //

    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback() {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = Users::where('fb_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/home');
            }else{
                $createUser = Users::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return redirect('/home');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
