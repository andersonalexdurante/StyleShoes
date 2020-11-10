@extends('templates/template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <img src={{url('assets/Logo-marca.png')}} class="p-4"  alt="Logo">
                </div>
                <form method="POST" action="/authenticate">
                    @csrf
                    <div class="form-container">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-block btn-lg btn-dark mb-4">Entrar</button>
                            <a href="/register">Não tem uma conta ainda? Cadastre-se</a>
                        </div>
                    </div>
                </form>
                </div>
        </div>
    </div>
@endsection