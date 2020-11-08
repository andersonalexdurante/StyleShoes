@extends('templates/template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src={{url('assets/Logo.png')}} class="p-4"  alt="Logo">
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
                            <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lembre-me</label>
                            </div>
                            <button type="submit" class="btn-block btn-lg btn-primary">Entrar</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
@endsection