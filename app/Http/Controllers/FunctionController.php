<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunctionController extends Controller
{
    
    public function validarEmail($dados)
    { 
   
      if (filter_var($dados, FILTER_VALIDATE_EMAIL)) {
            return true;
       
           
        }else{
         
             return  false; 
         }
        
    }
}
