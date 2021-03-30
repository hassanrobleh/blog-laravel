<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Manager\UserManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    private $manager;

    public function __construct(UserManager $manager)
    {
        $this->manager = $manager;
    }

    public function auth()
    {
        // Envoyer une requête à Github
        return Socialite::driver('github')->redirect();
    }

    public function redirect() 
    {
        // Recevoir une requête de Github
        $userinfos = Socialite::driver('github')->stateless()->user();
        //dd($userinfos);

        $user = User::firstOrCreate([
            'email' => $userinfos->email
        ], [
            'name' => $userinfos->name,
            'password' => Hash::make(Str::random(24)),
            'avatar' => ($userinfos->avatar && !empty($userinfos->avatar))
                            ? $this->manager->uploadAvatar($userinfos)
                            : User::DEFAULT_AVATAR_PATH, 
        ]);
        Auth::login($user);

        return redirect()->route('home');
    }
}
