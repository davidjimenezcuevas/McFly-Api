<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Validator;

class Nota extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'nota';

    public static function createNota($data)
    {
    	$nota = new Nota;

    	if($nota->validateData($data) == true){
    		$nota->message = $data['message'];
   			$nota->id_user = $data['id_user'];
   			$nota->id = Nota::count() + 1;  
   			$nota->save();
   			return response()->json('Nota creada correctamente', 200);
    	}else{
    		return response()->json('Error', 403);
    	}
    }

    public static function getAll()
    {
    	$notas = Nota::all();
    	return response()->json($notas, 200);
    }

    public static function getAllByUser($id)
    {
    	$notas = Nota::where('id_user', '=', $id)->get();
    	return response()->json($notas, 200);
    }

    public static function getNotaById($id)
    {
    	$nota = Nota::where('id', '=', $id)->get();
    	return $nota;
    }

    public function validateData($data)
    {
        $validator = Validator::make($data, [
            'message' => 'required||max:400',
            'id_user' => 'required||string',
        ]);

        if ($validator->fails()) {
            return false;
        }else{
            return true;
        }
    }
}


