<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnderecoCep extends Model
{
    protected $fillabel = ['cep', 'lougradouro', 'bairro', 'cidade', 'estado'];
}
