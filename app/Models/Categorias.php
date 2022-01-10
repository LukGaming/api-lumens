<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $filliable = [
        'id',
        'nome_categoria',
        'User_Id_Creator'
    ];
}
