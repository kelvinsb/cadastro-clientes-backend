<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'data_nascimento', 'sexo_id', 'endereco_id'];
}
