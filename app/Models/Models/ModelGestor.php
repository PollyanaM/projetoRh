<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelGestor extends Model
{
    protected $table = 'rh';
    protected $fillable = ['funcionario', 'cargo', 'setor', 'salario', 'id_gestor'];

    public function relUsers()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_gestor');
    }
}
