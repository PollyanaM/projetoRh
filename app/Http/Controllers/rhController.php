<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelGestor;
use App\Models\User;

class rhController extends Controller
{
    private $objUser;
    private $objFuncionario;
    
    public function __construct()
    {
        $this->objUser = new User();
        $this->objFuncionario = new ModelGestor();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaborador=$this->objFuncionario->paginate(3);
        return view('index', compact('colaborador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = $this->objUser->all();
        return view('create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objFuncionario->create([
            'funcionario'=>$request->funcionario,
            'cargo'=>$request->cargo,
            'setor'=>$request->setor, 
            'salario'=>$request->salario,
            'id_gestor'=> $request->id_gestor 
        ]);

        if($cad){
            return redirect('rh');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rh=$this->objFuncionario->find($id);
        return view('show', compact('rh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colaboradores = $this->objFuncionario->find($id);
        $usuarios = $this->objUser->all();
        return view('create', compact('colaboradores', 'usuarios'));
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
        $this->objFuncionario->where(['id'=>$id])->update([
            'funcionario'=>$request->funcionario,
            'cargo'=>$request->cargo,
            'setor'=>$request->setor, 
            'salario'=>$request->salario,
            'id_gestor'=> $request->id_gestor 
        ]);
        return redirect('rh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objFuncionario->where(['id'=>$id])->delete();
        return redirect('rh');
    }
}
