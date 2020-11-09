@extends('templates/nav-bar')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="card-columns">
                @foreach ($products as $product)
                    @php
                        $image = $product::find($product->id)->relImages;    
                    @endphp
                    <div class="card hover">
                        <div class="card-body">
                            <img src="{{url('/storage/'.$image->title)}}" width="100%" alt="Imagem do produto">
                            <h3 class="font-weight-bold">{{$product->title}}</h3>
                            <button type="button" class="font-weight-bold btn btn-danger">
                                <a class="text-light" href="/product/{{$product->id}}">SAIBA MAIS</a>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection