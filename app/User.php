<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Nota;

class User extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'user';

    public static function fav($id_user, $id_nota)
    {
        if(User::existUser($id_user) == true){
            User::where('id', $id_user)->push('fav', $id_nota);
            return response()->json('Fav marcado', 200);
        }else{
            return response()->json('Usuario no existe', 401);
        }
        
    }

    public static function getNotaFav($id_user)
    {
        if(User::existUser(1) == true){
            $arrayNotas = [];
            $user = User::where('id', '=', 1)->get();
            $notasFav = $user[0]['original']['fav'];

            foreach ($notasFav as $id) {
                $nota = Nota::where('id', '=', $id)->get();
                if(sizeof($nota) > 0){
                    array_push($arrayNotas, $nota[0]['original']);
                } 
            }
            return response()->json($arrayNotas, 200);
        }else{
            return response()->json('Usuario no existe', 401);
        }
    }

    public static function existUser($id)
    {
        $user = User::where('id', '=', $id)->get();
        if(sizeof($user) > 0){
            return true;
        }else{
            return false;
        }
    }
}
