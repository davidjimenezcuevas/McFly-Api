<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function fav(Request $request)
    {
    	$id_user = $request->all()['id_user'];
    	$id_nota = $request->all()['id_nota'];

    	$result = User::fav($id_user, $id_nota);
    	return $result;
    }

    public function getNotaFav(Request $request)
    {
    	$id_user = $request->all()['id_user'];

    	$result = User::getNotaFav($id_user);
    	return $result;
    }
}
