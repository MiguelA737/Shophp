<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelProduto;
use App\Models\Models\ModelUser;
use App\Models\Models\ModelCompra;

class CompraController extends Controller
{

    private $objCompra;
    private $objUser;
    private $objProduto;

    public function __construct(){
        $this->objUser=new ModelUser();
        $this->objProduto=new ModelProduto();
        $this->objCompra=new ModelCompra();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("main_views/list", [
            'type' => 'compra',
            'pagename' => 'Listar Compras',

            'objects' => $this->objCompra->addSelect([

                'user' => $this->objUser->select('nome')
                    ->whereColumn('user.id', 'compra.id_user'),
                
                'product' => $this->objProduto->select('nome')
                    ->whereColumn('produto.id', 'compra.id_produto')

            ])
            ->get(),

            'attributes' => ['user','product','quantidade'],
            'labels' => ['Usuário', 'Produto', 'Quantidade']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadform() {
        return view("main_views/insert", [
            'pagename' => 'Inserir Compra',

            'fields' => [

                'id_user' => [
                    'element' => 'select',
                    'options' => $this->objUser->select('nome', 'id')->orderBy('id')->get()
                ],
                'id_produto' => [
                    'element' => 'select',
                    'options' => $this->objProduto->select('nome', 'id')->orderBy('id')->get()
                ],

                'quantidade' => [
                    'element' => 'input',
                    'type' => 'number'
                ]
            ],

            'attributes' => ['id_user', 'id_produto', 'quantidade'],
            'labels' => ['Cliente', 'Produto', 'Quantidade'],
            'method' => 'POST',
            'action' => '/compra/inserir/action'
        ]);
    }

    public function store(Request $request)
    {
        $cad = $this->objCompra->create([
            'id_user'=>$request->id_user,
            'id_produto'=>$request->id_produto,
            'quantidade'=>$request->quantidade
            ]);
            if($cad)
                return redirect("/compras");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loadformupdate($id) {
        return view("main_views/insert", [
            'pagename' => 'Editar Compra',

            'fields' => [

                'id_user' => [
                    'element' => 'select',
                    'options' => $this->objUser->select('nome', 'id')->orderBy('id')->get()
                ],
                'id_produto' => [
                    'element' => 'select',
                    'options' => $this->objProduto->select('nome', 'id')->orderBy('id')->get()
                ],

                'quantidade' => [
                    'element' => 'input',
                    'type' => 'number'
                ]
            ],

            'attributes' => ['id_user', 'id_produto', 'quantidade'],
            'labels' => ['Cliente', 'Produto', 'Quantidade'],
            'method' => 'POST',
            'action' => '/compra/editar/action/' . $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->objCompra->where(['id'=>$id])->update([
            'id_user'=>$request->id_user,
            'id_produto'=>$request->id_produto,
            'quantidade'=>$request->quantidade
        ]);

        return redirect("/compras");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objCompra->destroy($id);
        return($del)?"sim":"não";
    }

}
