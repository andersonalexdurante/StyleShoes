@extends('templates/nav-bar')

@section('content')
  <h1 class="text-center text-dark font-weight-bold mt-3">GERENCIAMENTO DE PRODUTOS</h1>

  <div class="container text-center">
    <a href="/register-product">
      <button type="button" class="btn btn-primary btn-lg m-3">Cadastrar Produto</button>
    </a>

    <table class="table bg-light">
      <thead>
        <tr>
          <th scope="col">Produto</th>
          <th scope="col">Nome</th>
          <th scope="col">Categoria</th>
          <th scope="col">Operação</th>
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
            <td class="align-middle">{{$product->title}}</td>
            <td class="align-middle">{{$product->category}}</td>
            <td class="align-middle">
              <a href="/update-product/{{$product->id}}">
                  <img src="{{url('/assets/upgrade.svg')}}" height="30px" width="30px" alt="Atualizar">
                </a>
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
                <h5 class="modal-title" id="exampleModalLabel">Quer apagar o modelo {{$product->title}} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <img src="{{url('/storage/'.$image->title)}}" style="max-width: 300px; max-height: 300px:" alt="{{$product->title}}">
                </div>
                <form action="/delete-product/{{$product->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger text-light">Apagar</button>
                        </div>
                </form>
                
            </div>
            </div>
            
        </div>    
        @endforeach
      </tbody>
    </table>    
  </div>

@endsection