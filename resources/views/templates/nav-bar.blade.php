@extends('templates/template')

@section('navbar')
    @parent
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            <img src={{url('assets/Logo.png')}} width='50px' height="50px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a href="/">
                <img src="{{url('/assets/STYLE_SHOES.png')}}" alt="STYLESHOES">
              </a>
            </li>   
          </ul>
          <li class="nav-item active text-light mr-3 font-weight-bold" style="list-style: none">
            {{session('user')}}
          </li>
          @if (session('user') === 'admin')
            <li class="nav-item" style="list-style: none">
              <a class="nav-link bg-success rounded text-light" href="/admin">Gerenciar Produtos</a>
            </li>
          @endif
         
          <li class="nav-item active" style="list-style: none">
            <a href="/logout">
              <img class="nav-link" src="{{url('assets/log-out.svg')}}" alt="Logout">
            </a>
          </li>
        </div>
      </nav>
@endsection
