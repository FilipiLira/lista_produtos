<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	protected $table = 'produtos'; // seta a tabela  relacionada a model, não precisa especificar aqui.
	public $timestamps = false; // seta a data e horário das modificações na tabela.
    protected $fillable = ['nome', 'descricao','valor', 'quantidade'];
    // O atributo $fillable é necessário para que em uma inserção de massa (um array com vários valores), o laravel saiba
    // quais valores ele deve aceitar, porque normalmente o laravel bloqueia esse tipo de inserção.
    protected $guarded = ['id'];
}
