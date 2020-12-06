<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    use HasFactory;
    protected $table='user';
    protected $fillable = ['nome','email','senha'];

    public function relCompras(){
        return $this->hasMany("App\Models\Models\ModelCompra","id_user");
    }
}
