<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $fillable = [
        'produtos',
        'valorpedido',
        'datapedido',
    ];
}
