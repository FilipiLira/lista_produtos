@extends('layout.principal')
@section('metatags')
@foreach($produtos as $produto)
<meta valorproduto="{{$produto->valor}}">
@endforeach
@section('conteudo')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"></div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>
                    <a href="/produtos/novocadastro">
                        <button class="btn btn-default">Novo</button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody> 
                    <!-- <?php // foreach ($varaveis as $variavel) ?>
                    <?php // endforeach ?>-->
                    @if(empty($produtos))
                    <div class="alert alert-danger mt-5">Não existem produtos cadastrados.</div>
                    @else
                    @foreach ($produtos as $produto)
                    <tr class="{{$produto->quantidade <= 1 ? 'alert-danger' :'' }}">
                        <td scope="row">{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->valor}}</td>
                        <td>{{$produto->descricao}}</td>
                        @if($produto->quantidade == 1)
                        <td><span>Ultimo</span></td>
                        @elseif($produto->quantidade < 1)
                        <td><span>Em falta</span></td>
                        @else
                        <td>{{$produto->quantidade}}</td>
                        @endif
                        <td>
                            <div class="btn-group ">
                                <!--Para passar um parametro em uma requisição podem ser usadas duas estratégias diferentes,
                                    parametros de busca (query params) ou parametros de rota (path params).
                                    Em parametros de busca a sintaxe seria o sginte:
                                    href="produtos/detalhes?id=<'?= $produto->id?''>" passando uma chave e valor na requisição.
                                    Já em parametros de rota seria:
                                    href="produtos/detalhes/<'?= $produtos->id?'>" o valor é colocado logo após uma barra separando do resto do path da rota.
                                    a rota precisa ser modificada para => Route::get('produtos/detalhes/{id}')

                                    sintaxe pura do php: <?=$produto->id ?>
                                    sintaxe do blade: {{$produto->id}}
                                --> 
                                <button class="btn btn-success">
                                    <a class="text-light" style="text-decoration: none" href="produtos/detalhes/{{$produto->id}}">
                                        Detalhes
                                    </a> 
                                </button>
                                <button class="btn btn-primary">
                                    <a href="/produtos/editar/{{$produto->id}}" class="text-light" style="text-decoration: none">
                                        Editar
                                    </a>
                                </button>
                                <button class="btn btn-danger">
                                    <a fl-exc='false' href="produtos/excluir/{{$produto->id}}" class="text-light" style="text-decoration: none">
                                        Excluir
                                    </a>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        @if(old('produto')) <!--A mensagem de confirmação só será exibida se a requisição for um redirect com o valor old() da requisição anterior-->
           <div class="alert alert-success">
               <p>O produto {{ old('produto')}} foi alterado com sucesso!</p> <!--O método olde serve para usar valores de uma requisição anteiror nesta nova, no controller é passado por: redirect(...)->withInput()-->
           </div>
        @endif
        <style>
            table span{
                margin: 0 3px 0 3px !important;
            }
        </style>

    <script>
        function excluirProduto(){
            $('[fl-exc]').each((i, link)=>{
                const linkJ = $(link)
                linkJ.on('click', function (e){
                })
            })
        }

        excluirProduto()

        function calcValorTotalProduto(){
            let valorTotalProduto = 0
            $('[valorProduto]').each((i, elem) =>{
                const temp =  parseInt(elem.getAttribute('valorProduto'))
                valorTotalProduto += temp
            })

            const span = $('<span></span>').css('padding-left', '310px')
            const linhaTabela = $('<tr></tr>')
            const dadoTabela = $('<td></td>')

            dadoTabela.attr('colspan', '3')

            span.addClass('font-weight-bold')
            span.html(`Total: ${valorTotalProduto}`)
            dadoTabela.append(span)
            linhaTabela.append(dadoTabela)
            $('tbody').append(linhaTabela)
        }

        calcValorTotalProduto()
    </script>
    @stop