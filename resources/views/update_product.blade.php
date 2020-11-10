@extends('templates/nav-bar')

@section('content')
    <h1 class="text-center text-dark font-weight-bold mt-3">ATUALIZAR PRODUTO</h1>
    <div class="container col-8">
       
        <form method="POST" action="/update-product/{{$product->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-container">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->title}}" id="inputName" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Categoria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$product->category}}" id="inputCategory" name="category">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$product->color}}" id="inputColor" name="color">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Material</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$product->material}}" id="inputMaterial" name="material">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Preço</label>
                    <div class="col-sm-10">
                        <input type="number" step=".01" class="form-control" value="{{$product->price}}" id="inputPrice" name="price">
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                <img src="{{url('storage/'.$image->title)}}" style="max-width: 300px; max-height:300px" alt="Imagem do produto">
                </div>

                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="file" id="file">
                    <label class="custom-file-label" for="file">Escolha a imagem do produto</label>
                    <p class="small mark" style="color: red">Se não quiser mudar a imagem é só não adicionar outra!</p>
                </div>
                
                <button type="submit" class="btn-block btn-lg btn-primary mt-3">Atualizar Produto</button>
            </div>
        </form>
    </div>
@endsection