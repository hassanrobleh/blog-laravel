<?php 


namespace App\Manager;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserManager 
{
    public function uploadAvatar($data) 
    {
        // Récuperer l'image à partir de son URL
        $content = file_get_contents($data->avatar);
        //dd($content);

        // Générer le nom de l'image et définir son path
        $path = 'users/' . $data->id . '_' . Str::random(12) . '.jpg';
        //dd($path);

        // Stocker l'image en question
        Storage::disk('public')->put($path, $content);

        // Retourner le path
        return $path;
    }
}