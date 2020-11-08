@extends('templates/template')

@section('navbar')
    @parent
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src={{url('assets/Logo.png')}} width='50px' height="50px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link">Bem vindo, {{session('user')}} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <img class="nav-link" src="{{url('assets/user.svg')}}" alt="Profile">
            </li>
            <li class="nav-item active">
                <a href="/logout">
                    <img class="nav-link" src="{{url('assets/log-out.svg')}}" alt="Profile">
                </a>
            </li>
            @if (session('user') === 'admin')
            <li class="nav-item">
                <a class="nav-link bg-success rounded text-light" href="/admin">Gerenciar Produtos</a>
            </li>
            @endif   
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Digite um produto" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
          </form>
        </div>
      </nav>
@endsection
