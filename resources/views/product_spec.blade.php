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
                <button type="button" class="btn-lg btn-warning mt-2" data-toggle="modal" data-target="#exampleModal">
                    Comprar
                </button>
            </div>
        </div>  

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Você deseja colocar {{$product->title}} no seu carrinho? <strong>R$: {{number_format($product->price, 2, ',', '.')}}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <img src="{{url('/storage/'.$image->title)}}" style="max-width: 300px; max-height: 300px:" alt="{{$product->title}}">
            </div>
            <form action="/product/buy/{{$product->id}}" method="POST">
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning text-light">Adicionar no carrinho</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>    

@endsection