@extends('templates/nav-bar')

@section('content')
    <h1 class="text-center text-light font-weight-bold mt-3">CADASTRO DE PRODUTO</h1>
    <div class="container col-8">
       
        <form method="POST" action="/registerProduct">
            @csrf
            <div class="form-container">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="nome">
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
                        <input type="number" class="form-control" id="inputPrice" name="price">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputImage" name="image">
                      <label class="custom-file-label" for="inputGroupFile01">Escolha a imagem do produto</label>
                    </div>
                </div>
                <button type="submit" class="btn-block btn-lg btn-primary">Cadastrar Produto</button>
            </div>
          </form>
    </div>
@endsection