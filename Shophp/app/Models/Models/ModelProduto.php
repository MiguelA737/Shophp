<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProduto extends Model
{
    use HasFactory;
    protected $table='produto';
    protected $fillable = ['nome','preco','descricao'];

    public function relCompras(){
        return $this->hasMany("App\Models\Models\ModelCompra","id_produto");
    }
}
