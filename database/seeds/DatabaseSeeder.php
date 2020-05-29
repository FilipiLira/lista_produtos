<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
    	$this->call('ProdutoTableSeeder');
        // $this->call(UsersTableSeeder::class);
    }
}

// seeds servem para a inserção de dados no banco.
// seeds diferentes podem ficar no mesmo arquivo
class ProdutoTableSeeder extends Seeder{
	public function run(){
		DB::insert('insert into produtos 
               (nome, quantidade, valor, descricao)
               values(?,?,?,?)', array('Geladeira', 2, 5909.00,
                 'Side by Side gelo na porta'));
	}
}
