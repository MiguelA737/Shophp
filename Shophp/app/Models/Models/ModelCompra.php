<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCompra extends Model
{
    use HasFactory;
    protected $table='compra';
    protected $fillable = ['id_user','id_produto','quantidade'];
    
    public function relProdutos(){
        return $this->hasOne("App\Models\Models\ModelProduto","id","id_produto");
    }

    public function relUsers(){
        return $this->hasOne("App\Models\Models\ModelUser","id","id_user");
    }
}
