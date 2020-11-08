@extends('templates/nav-bar')

@section('content')
    <h1 class="text-center text-light font-weight-bold mt-3">CADASTRO DE PRODUTO</h1>
    <div class="container col-8">
       
        <form method="POST" action="/cadastrar-produto" enctype="multipart/form-data">
            @csrf
            <div class="form-container">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Categoria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputCategory" name="category">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputColor" name="color">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Material</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputMaterial" name="material">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Preço</label>
                    <div class="col-sm-10">
                        <input type="number" step=".01" class="form-control" id="inputPrice" name="price">
                    </div>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="file" id="file">
                    <label class="custom-file-label" for="file">Escolha a imagem do produto</label>
                  </div>
                <button type="submit" class="btn-block btn-lg btn-primary">Cadastrar Produto</button>
            </div>
          </form>
    </div>
@endsection