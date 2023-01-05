<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recordatorioUsuario extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'recordatorio_usuario';
}
