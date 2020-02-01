<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{

	protected $table = 'pessoas';
	protected $fillable = [
		'codigo_xyz','nome','email','cpf','rg','nascimento','salario','peso','altura'
	];
	protected $date = [
		'created_at', 'updated_at', 'nascimento',
	];

	public $timestamps = true;

}
