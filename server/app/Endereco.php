<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['numero', 'complemento', 'endereco_banco_id'];
}
