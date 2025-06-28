<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use Carbon\Carbon;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         if(!Contact::where('email','anderson.deolliveira@hotmail.com')->first()){
              
            Contact::Create([
                'nome'=> 'Anderson Oliveira',
                'email'=> 'anderson.deolliveira@hotmail.com',
                'contato' => '971101711',
                'created_at'=> Carbon::now(),
            ]);
             
         };
         if(!Contact::where('email','anastacio_Pedro@hotmail.com.br')->first()){
              
            Contact::Create([
                'nome'=> 'Anastácio Pedro',
                'email'=> 'anastacio_Pedro@hotmail.com.br',
                'contato' => '971101712',
                'created_at'=> Carbon::now(),
            ]);
             
         };
         if(!Contact::where('email','antonio_S@hotmail.com.br')->first()){
              
            Contact::Create([
                'nome'=> 'Antócio Sebastião',
                'email'=> 'antonio_S@hotmail.com.br',
                'contato' => '971101713',
                'created_at'=> Carbon::now(),
            ]);
             
         };
         if(!Contact::where('email','marcioPedro@hotmail.com.br')->first()){
              
            Contact::Create([
                'nome'=> 'Marcio Pedro',
                'email'=> 'marcioPedro@hotmail.com.br',
                'contato' => '971101714',
                'created_at'=> Carbon::now(),
            ]);
             
         };
         if(!Contact::where('email','marcelaPaul@hotmail.com.br')->first()){
              
            Contact::Create([
                'nome'=> 'Marcela Paula',
                'email'=> 'marcelaPaul@hotmail.com.br',
                'contato' => '971101715',
                'created_at'=> Carbon::now(),
            ]);
             
         };
         if(!Contact::where('email','pauloAndre@hotmail.com.br')->first()){
              
            Contact::Create([
                'nome'=> 'Paulo André',
                'email'=> 'pauloAndre@hotmail.com.br',
                'contato' => '971101716',
                'created_at'=> Carbon::now(),
            ]);
             
         };
    
    }
}
