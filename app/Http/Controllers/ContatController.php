<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Controllers\FunctionController;
use App\Http\Requests\EditeRequest;
use App\Http\Requests\PreviewContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContatController extends Controller
{
    protected $verify;

    public function __construct()
    {
          $this->verify = new FunctionController();

    }
    public function created()
    {

        return view('main.CreateContact');

    }

    public function store(StoreRequest $dados)
    {
        $result = $this->verify->validarEmail($dados->emailInput);
       
        if(!$result){
            
            return back()->withInput()->with('error', 'Verifique o Email informado!');
        }
         //criar os usuarios 
         $resultCreate = Contact::createContat($dados);
   
         if ($resultCreate) {
        return redirect()->route('main.index')->with('success', 'Contato cadastrado com sucesso!');
       } else {
        return back()->withInput()->with('error', 'Falha ao cadastrar o contato!');
      }
   }

   public function preview(Contact $dados)
    { 

      return view('main.VisualizarContact', ['dados'=> $dados]);

   }
   public function editar(Contact $dados)
   {
 
      return view('main.EditeContact', ['dados'=> $dados]);
   }
 
   public function update(EditeRequest $request, Contact $dados)
   { 

      
    $resultEmail = Contact::getMailUser($request->emailInput,$dados->id);
           $resultContat = Contact::getContactUser($request->contatoInput,$dados->id);

     
           if($resultEmail){
      
             return back()->withInput()->with('error', 'Email já utilizado!');
           }

          if($resultContat){
              return back()->withInput()->with('error', 'Contato já utilizado!');
          }
         
          $resultUpdate = Contact::getUpContatct($request,$dados->id);

         
          if($resultUpdate){
                return back()->withInput()->with('success', 'Sucesso em atualizado os dados!');

          }else{

               return back()->withInput()->with('error', 'Falha em Atualizar dados!');
          }
   }

   public function destroy(Contact $dados)
   {

  

       $resultBusca = Contact::getBusqueDelete($dados->id);
   
  
       if(!$resultBusca){

         return redirect()->route('main.index')->with('success','Já Deletado!');
  
        }
  

        $delet = Contact::getDelete($dados);

        if($delet){
          
             return redirect()->route('main.index')->with('success','Deletado com Sucesso!');

          }else{

               return back()->withInput()->with('error', 'Falha em deletar Contato!');
          }
   }


   public function ative(Request $request)
   {     

    //produro o id e ativo ele 
     $result =  $contato = Contact::withTrashed()->find($request->id);

    if (!$result) {
        return back()->with('error', 'Contato não encontrado.');
    }

    if (!$contato->trashed()) {
     
      return back()->with('info', 'Contato já está ativo.');
    }

    $contato->restore();

  
     return back()->withInput()->with('success', 'Contato reativado com sucesso!');
   }
   
}
