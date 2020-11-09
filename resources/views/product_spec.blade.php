@extends('templates/nav-bar')

@section('content')
    <div class="container">
        <div class="product-container">           
            <div class="product-image">
                <img src="{{url('/storage/'.$image->title)}}" class="image" alt="Imagem do Produto">
            </div>
            <div class="product-data">
                <h3>{{$product->title}}</h3>
                <br>
                <h6>Categoria: {{$product->category}}</h6>
                <h6>Cor: {{$product->color}}</h6>
                <h6>Material: {{$product->material}}</h6>
                <br>
                <br>
                <h4  >R$: {{number_format($product->price, 2, ',', '.')}}</h6>
                <button type="button" class="btn-lg btn-warning mb-2"><a href="#" class="font-weight-bold text-dark">Comprar</a></button>
            </div>
        </div>  
    </div>    

@endsection