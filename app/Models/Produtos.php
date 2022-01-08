<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = [
        'nome',
        'valor',
        'descricao',
        'id_user_criador',
        'id_categoria',
        'created_at',
        'updated_at',
    ];
}
