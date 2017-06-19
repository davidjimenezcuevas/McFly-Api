<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Nota;

class NotaController extends Controller
{
    public function createNota(Request $request, Nota $model)
    {
    	$nota = new Nota;
    	$data = $request->all();
        
        $result = $nota::createNota($data);
        return $result;
    }

    public function getAll()
    {
    	$nota = new Nota;
    	$result = $nota::getAll();

    	return $result;
    }

    public function getAllByUser(Request $request)
    {
    	$nota = new Nota;
    	$id = $request->all()['id_user'];

    	$result = $nota::getAllByUser($id);
    	return $result;
    }

    public function getNotaById(Request $request)
    {
    	$nota = new Nota;
    	$id = $request->all()['id'];

    	$result = $nota::getNotaById($id);
    	return $result;
    }
}
