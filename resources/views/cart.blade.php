@extends('templates/nav-bar')

@section('content')
<h1 class="text-center text-dark font-weight-bold mt-3">SEU CARRINHO</h1>
    <div class="container col-8 text-center rounded">
        <table class="table bg-light rounded">
            <thead>
              <tr>
                <th scope="col">Produto</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Remover</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    @php
                        $image = $product::find($product->id)->relImages;    
                    @endphp
                    <tr>
                        <td>
                            <a href="/product/{{$product->id}}">
                                <img src="{{url('/storage/'.$image->title)}}" style="max-width: 120px; max-height: 120px:" width="auto" height="auto" alt="Imagem do Produto">
                            </a>
                        </td>
                        <td class="align-middle">
                            {{$product->title}}
                        </td>
                        <td class="align-middle">
                            <strong>R$: {{number_format($product->price, 2, ',', '.')}}</strong>
                        </td>
                        <td class="align-middle">
                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$product->id}}">
                                <img src="{{url('/assets/delete.svg')}}" height="30px" width="30px" alt="Apagar">
                            </button>
                        </td>
                    </tr> 
                         <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Quer retirar {{$product->title}} do carrinho?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <img src="{{url('/storage/'.$image->title)}}" style="max-width: 300px; max-height: 300px:" alt="{{$product->title}}">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger text-light"><a class="text-light" href="/delete/cart/product/{{$product->id}}">Apagar</a></button>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <h3>Total a pagar: <strong>R$ {{$amount}}</strong></h3>
        <button type="submit" disabled class="btn- btn-lg btn-success mt-3 mb-5">Comprar produtos</button>    
    </div>
    
</div>
@endsection