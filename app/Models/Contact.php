<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;
use PhpParser\Node\Stmt\Catch_;

use function PHPUnit\Framework\isEmpty;

class Contact extends Model
{
    use SoftDeletes, HasFactory;

    #protejer tabela
    protected $table = 'Contatcs';

    protected $fillable = ['nome', 'email', 'contato', 'created_at','deleted_at','updated_at'];


    public static function getAllListContato()
    {
        $return = DB::table('Contatcs')->select('id','nome', 'contato', 'email','created_at', 
        DB::raw("IFNULL(deleted_at, 0) as info"))->get();
        return $return->isEmpty() ? false : $return;
    }

    public static function createContat($dados)
    {

       DB::beginTransaction();
  
      try{
      
         $inserCcontact = [
          "nome" => $dados->nameInput,
          "contato" => $dados->contatoInput,
          "email" => $dados->emailInput,
          "created_at" => now(),
         ];
       

         $resultInsert = DB::table('Contatcs')->insert($inserCcontact);
        
          DB::commit();

         return true;

          }catch(\Throwable  $e){

           DB::rollBack();

        return false;
       }

     
    }

    public static function getMailUser($dados,$id)
    {
        $result = Contact::where('email', $dados)->where('id', '!=', $id)->exists();
  
        return $result;
    }
    
     public static function getContactUser($dados,$id)
    {

        $result = Contact::where('contato', $dados)->where('id', '!=', $id)->exists();
  
        
        return $result;
    }

    public static function getUpContatct($dados, $id)
    {

         $resultQuery = DB::table('Contatcs')->where('id' , $id)->update(['nome' => $dados->nameInput, 'email'=> $dados->emailInput ,'contato' => $dados->contatoInput, 'updated_at' => now()]);

         
         return $resultQuery > 0 ? true : false;
    }

    public static  function getDelete($dados)
    {

           $resultQuery = $dados->delete();
         
           return $resultQuery;
    }


    public static function getBusqueDelete($idBusca)
    { 
          $result = DB::table('Contatcs')->where('id', $idBusca)
          ->whereNotNull('deleted_at')->get();

       
          return $result->isEmpty() ? true : false;


    }
}
