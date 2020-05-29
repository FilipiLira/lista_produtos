<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use estoque\Produto;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller{
	
	public function listar(){

        // Produto::all() é um método da model que retorna todos os registros do banco.
        // A minha classe modell Produto interage com a minha tabela produtos para as operações de leitura e escrita no banco.
        // Por convenção o nome da tabela deve ser o plural do nome da modell, Produto modell, produtos tabela.
        // Chaves primárias são sempre relacionadas com a coluna id.
        // Por padrão as modells do Eloquent irão buscar os dados para a con~exão com o banco em config/database.php
	    $produtos = Produto::all(); //DB::select('select *from produtos');

	    return view('produtos.listagem')->withProdutos($produtos);
	}

	public function detalhes(Request $request){
		// A interface Request possui metodos que nos dão acesso as propriedades passadas por requisição
		//$id = $request->input('id'); otendo valor id passado na requição, poderia apenas receber o id como parametro do metodo detalhes(id), o id vindo da rota seria passado para o método pelo laravel.
        $id = $request->route('id');
        
        if(!is_numeric($id)){ // se o id for inválido, o retorno será uma view de erro
        	return view('erro_detalhes');
        } else if($id > 0){
        	 $produto = Produto::find($id); //DB::select('select *from produtos where id = ?', [$id]);
            // a interrogação no final do select sinaliza onde o parametro passado ([$id]) vai ficar 
        	return view('produtos.detalhes')->withProduto($produto);
            // view com magicMethod withProduto, atribui a uma variável produto na view o valor de $produto do metodo que está retornando
        } else{
        	return view('erro_detalhes');
        }


       
	}

	public function novoCadastro(){
		return view('produtos/cadastro');
	}

	public function cadastrar(ProdutosRequest $request){         
         //Instanciando a classe produto que é uma modell,
         // a partir disso crio as suas propriedades de acordo com os valores que recebo pela requisição
         //$produto->nome = $novoProduto['produto'];
         //$produto->preco = $novoProduto['preco'];
         //$produto->descricao = $novoProduto['descricao'];
         //$produto->quantidade = $novoProduto['quantidade'];
         //$novoProduto = $request->all();
         // Ao se passar os parametros para o construtor da classe como array, deve ser passado um array para
         // a propriedade $fillable da model Produto.
         //$produto = new Produto($novoProduto)
         //$produtos->save() // O metodo save() perciste no banco um modelo desse objeto como novo registro
         Produto::create($request->all()); // codigo mais enchuto possível.
        //DB::insert('insert into produtos (nome, valor, descricao, quantidade) values(?, ?, ?, ?)', 
         	//array($nome, $valor, $descricao, $quantidade));

         // $request->all(), metodo retorna todos os parametros enviados via requisição.

         return redirect()->action('ProdutoController@listar'); //->withInput($request->only('produto'));
	}

	public function excluir(Request $request){
         $id = $request->route('id');

         $produto = Produto::find($id);
         //DB::delete('delete from produtos where id = ?', [$id]);
         $produto->delete();

         return redirect()->action('ProdutoController@listar');
	}

    public function editarForm(Request $request){
        $id = $request->route('id');
        
        $produto = Produto::find($id);

        
        if($produto){
            return view('produtos.editarForm')->withProduto($produto);
        } else{
            return view('erro_detalhes');
        }
    }

    public function editar(Request $request){
        
        $newProduto = $request->all(); // pega todos os valores de inputs vindos da requisição

        $id = $newProduto["id"];  // atribuindo os valores do array $produto à variáveis
        $oldProduto = Produto::find($id);

        $oldProduto->nome = $newProduto["produto"];
        $oldProduto->valor = $newProduto["preco"];
        $oldProduto->quantidade = $newProduto["quantidade"];
        $oldProduto->descricao = $newProduto["descricao"];

        $oldProduto->save();
        //$nome = $produto["produto"];
        //$valor = $produto["preco"];
        //$quantidade = $produto["quantidade"];
        // $descricao = $produto["descricao"];
        

        //DB::update("update produtos set nome = ?, valor = ?, descricao = ?, quantidade = ? where id = ? ", array($nome, $valor, $descricao, $quantidade, $//id));


        return redirect()->action('ProdutoController@listar')->withInput($request->only('produto')); // pegando os dados da requisição que cadastra o novo produto para passar esse valor para a pagina que recebe o redirect. O parâmetro $request->only('produto') indica que apenas o valor de produto deve ser passado, se não for especificado todos os valores de inputs são passados.

        //Redirect para URI return redirect("/produtos")->withInput($request->only('produto')); pode-se fazer o redirect para uma URI, ex: /produtos, ou para um controller através do método action(...)
    }

    public function retornaJson(){
    
        $produtos = DB::select('select *from produtos');

        // retornado arquivo json com o método response
        return response()->json($produtos);
    }

    /*public function baixar(){

        return response()->download('../../../public/files/sass.pdf');
    }*/
}