<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelUser;

class UserController extends Controller
{

    private $objUser;

    public function __construct(){
        $this->objUser=new ModelUser();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view("main_views/list", [
            'type' => 'cliente',
            'pagename' => 'Listar Clientes',
            'objects' => $this->objUser->all(),
            'attributes' => ['nome', 'email', 'senha'],
            'labels' => ['Nome', 'E-mail', 'Senha']
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
            'pagename' => 'Inserir Cliente',

            'fields' => [
                'nome' => [
                    'element' => 'input',
                    'type' => 'text'
                ],
                'email' => [
                    'element' => 'input',
                    'type' => 'email'
                ],
                'senha' => [
                    'element' => 'input',
                    'type' => 'password'
                ]
            ],

            'attributes' => ['nome', 'email', 'senha'],
            'labels' => ['Nome', 'E-mail', 'Senha'],
            'method' => 'POST',
            'action' => '/cliente/inserir/action/'
        ]);
    }

    public function store(Request $request)
    {
        $cad = $this->objUser->create([
        'nome'=>$request->nome,
        'email'=>$request->email,
        'senha'=>$request->senha
        ]);
        if($cad)
            return redirect("/clientes");
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
        $user = $this->objUser->find($id);
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
            'pagename' => 'Editar Cliente',

            'fields' => [
                'nome' => [
                    'element' => 'input',
                    'type' => 'text'
                ],
                'email' => [
                    'element' => 'input',
                    'type' => 'email'
                ],
                'senha' => [
                    'element' => 'input',
                    'type' => 'password'
                ]
            ],

            'attributes' => ['nome', 'email', 'senha'],
            'labels' => ['Nome', 'E-mail', 'Senha'],
            'method' => 'POST',
            'action' => '/cliente/editar/action/' . $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->objUser->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'email'=>$request->email,
            'senha'=>$request->senha
        ]);

        return redirect("/clientes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objUser->destroy($id);
        return($del)?"sim":"não";
    }

}
