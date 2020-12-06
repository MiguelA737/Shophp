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
        dd($this->objProduto->find(1)->relCompras);
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
    public function store(Request $request)
    {
        $cad = $this->objUser->create([
            'id_user'=>$request->id_user,
            'id_produto'=>$request->id_produto,
            'quantidade'=>$request->quantidade
            ]);
            if($cad)
                return redirect("/");
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
    public function update(Request $request, $id)
    {
        $this->objCompra->where(['id'=>$id])->update([
            'id_user'=>$request->id_user,
            'id_produto'=>$request->id_produto,
            'quantidade'=>$request->quantidade
        ]);

        return redirect("/");
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
