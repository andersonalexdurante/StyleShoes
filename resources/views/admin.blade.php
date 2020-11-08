@extends('templates/nav-bar')

@section('content')
    <h1 class="text-center text-light font-weight-bold mt-3">GERENCIAMENTO DE PRODUTOS</h1>

    <div class="text-center">
        <a href="/cadastrar-produto">
            <button type="button" class="btn btn-primary btn-lg m-3">Cadastrar Produto</button>
        </a>

        <table class="table bg-light">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Nome</th>
                <th scope="col">Marca</th>
                <th scope="col">Operação</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection