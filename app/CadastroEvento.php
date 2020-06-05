<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadastroEvento extends Model
{
    protected $dates = [
        'expires_at',
        'outro_campo_do_tipo_timestamp',
    ];
}
