@extends('layouts.app');

@section('content')

  <section class="container col-12">
    <div class="row">
      <col-md-12></col-md-12>
      <h1>Atualização do Produto</h1>
    </div>
    @if(isset($product))
    <form action="/produtos/atualizar" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" name="idProduct" value="{{$product->id}}" hidden>
      <div class="form-group">
        <label for="nameProduct">Nome do Produto</label>
        <input class="form-control" type="text" name="nameProduct" id="nameProduct" value="{{$product->name}}">
      </div>
      <div class="form-group">
        <label for="desc">Descrição do Produto</label>
        <textarea class="form-control" name="desc" id="desc"> {{$product->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="stockProduct">Quantidade</label>
        <input class="form-control" type="number" name="stock" id="stockProduct" value="{{$product->quantity}}">
      </div>
      <div class="form-group">
        <label for="priceProduct">Preço do Produto</label>
        <input class="form-control" type="number" step=".01" name="price" id="priceProduct" value="{{$product->price}}">
      </div>
      <div class="form-group">
        <label for="imgProduct">Imagem do Produto</label>
        <input class="form-control" type="file" name="imgProduct" id="imgProduct">
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Atualizar</button>
      </div>
    </form>

    @elseif(isset($result)) <?php // Pregunto si existe un resultado para saltar el else y no dar un mensaje contradictorio. Si existe el resultado, no hagas nada ?>


    @else 
      <h1>Você não passou um id ou o produto não existe!</h1>
    @endif 
    <div class="row">
      <div class="col-md-12">
        @if(isset($result))
          @if($result)
            <h1>Deu certo campeao!</h1>
          @else
            <h1>Nao deu certo sua atualização, e foi sua culpa!</h1>
          @endif
        @endif
      </div>

    </div>

  </section>

@endsection