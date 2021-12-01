@extends('templates.template')

@section('content')
    <div class="col-8 m-auto">
        @if(isset($colaboradores))
            <form name="formEdit" id="formEdit" method="POST" action="{{url("rh/$colaboradores->id")}}">
                @method('PUT')
        @else
            <form name="formCadastrar" id="formCadastrar" method="POST" action="{{url('rh')}}">
        @endif
        <form name="formCadastrar" id="formCadastrar" method="POST" action="{{url('rh')}}">
            @csrf
            <input class="form-control" type="text" name="funcionario" id="funcionario" placeholder="Nome do colaborador" value="{{$colaboradores->funcionario ?? ''}}"/><br/>
            <select class="form-control" name="id_gestor" id="id_gestor">
                <option value="{{$colaboradores->relUsers->id ?? ''}}">{{$colaboradores->relUsers->name ?? 'Selecione'}}</option>
                @foreach($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach    
            </select><br/>
            <input class="form-control" type="text" name="cargo" id="cargo" placeholder="Cargo do Colaborador" value="{{$colaboradores->cargo ?? ''}}"/><br/>
            <input class="form-control" type="text" name="setor" id="setor" placeholder="Setor do Colaborador" value="{{$colaboradores->setor ?? ''}}"/><br/>
            <input class="form-control" type="text" name="salario" id="salario" placeholder="Salário do Colaborador" value="{{$colaboradores->salario ?? ''}}"/><br/>
            <input class="btn btn-primary" type="submit" value="@if(isset($colaboradores)) Editar @else Cadastrar @endif"/>
        </form>
    </div>
@endsection