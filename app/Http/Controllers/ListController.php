<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ListController extends Controller
{
    
    public function index ()
    {
         //busco o retorno 
         $retornoLista = Contact::getAllListContato();
       
        return view('main.index', ['contacts' => $retornoLista]);
    }
}
