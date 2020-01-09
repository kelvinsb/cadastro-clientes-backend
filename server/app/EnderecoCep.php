<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnderecoCep extends Model
{
    protected $fillable = ['cep', 'logradouro', 'bairro', 'cidade', 'estado'];
}
