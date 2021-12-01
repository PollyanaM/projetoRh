@extends('templates.template')

@section('content')
    <div class="col-8 m-auto">

      <div class="text-center mt-3 mb-4">
        <nav class="navbar navbar-light">
          <h1>Gestão RH</h1>
        <a href="{{url('rh/create')}}">
          <button type="button" class="btn btn-success">Cadastrar</button>
        </a>
        </nav>
      </div>
      
        @csrf
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Funcionário (a)</th>
                <th scope="col">Cargo</th>
                <th scope="col">Setor</th>
                <th scope="col">Salário</th>
                <th scope="col">Gestor</th>
              </tr>
            </thead>


            <tbody>
            @foreach($colaborador as $colaboradores)
                @php
                  $user = $colaboradores->find($colaboradores->id)->relUsers
                @endphp
              <tr>
                <th scope="row">{{$colaboradores -> id}}</th>
                <td>{{$colaboradores -> funcionario}}</td>
                <td>{{$colaboradores -> cargo}}</td>
                <td>{{$colaboradores -> setor}}</td>
                <td>{{$colaboradores -> salario}}</td>
                <td>{{$user -> name}}</td>

                  <td>
                    <a href="{{route('rh.show', $colaboradores->id)}}">
                      <button type="button" class="btn btn-warning">Visualizar</button>
                    </a>
                  </td>

                  <td>
                    <a href="{{route('rh.edit', $colaboradores->id)}}">
                      <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                  </td>
                
                
                <td>
                  <form action="{{route('rh.destroy', $colaboradores->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                  </form>
                </td>
              </tr>  
            @endforeach

            </tbody>
          </table>
          {{$colaborador->links("pagination::bootstrap-4")}}
    </div>
@endsection