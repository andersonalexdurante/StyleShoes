@extends('templates/template')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-middle">
            <div class="col-md-6">
                <h1 class="text-center">Cadastro</h1>
                <form method="POST" action="/register">
                    @csrf
                    <div class="form-container">
                        <div class="form-group">
                            <label for="exampleInputName">Nome</label>
                            <input type="text" class="form-control" id="inputName" name="name" aria-describedby="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-block btn-lg btn-primary mb-4">Cadastrar</button>
                            <a href="/">Já possui uma conta? Entrar</a>
                        </div>
                    </div>
                </form>
                </div>
        </div>
    </div>
@endsection