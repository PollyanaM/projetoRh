@extends('templates.template')

@section('content')
    <div class="col-8 m-auto">
      
      @php
        $user=$rh->find($rh -> id) -> relUsers;
      @endphp
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Dados do Colaborador</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Colaborador</td>
            <td>{{$rh->funcionario}}</td>
          </tr>
          <tr>
            <td>Cargo:</td>
            <td>{{$rh->cargo}}</td>
          </tr>
          <tr>
            <td>Setor:</td>
            <td>{{$rh->setor}}</td>
          </tr>
          <tr>
            <td>Salário:</td>
            <td>R${{$rh->salario}}</td>
          </tr>
          <tr>
            <td>Gestor:</td>
            <td>{{$user->name}}</td>
          </tr>
        </tbody>
      </table>
    </div>
@endsection