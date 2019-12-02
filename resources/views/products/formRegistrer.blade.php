@extends('layouts.app')

@section('content')

  <section class="container col-12">
    <div class="row">
      <col-md-12></col-md-12>
      <h1>Cadastro de Produto</h1>
    </div>
    <form action="/produtos/cadastrar" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="nameProduct">Nome do Produto</label>
        <input class="form-control" type="text" name="nameProduct" id="nameProduct">
      </div>
      <div class="form-group">
        <label for="desc">Descrição do Produto</label>
        <input class="form-control" type="text" name="desc" id="desc">
      </div>
      <div class="form-group">
        <label for="stockProduct">Quantidade</label>
        <input class="form-control" type="number" name="stock" id="stockProduct">
      </div>
      <div class="form-group">
        <label for="priceProduct">Preço do Produto</label>
        <input class="form-control" type="number" step=".01" name="price" id="priceProduct">
      </div>
      <div class="form-group">
        <label for="imgProduct">Imagem do Produto</label>
        <input class="form-control" type="file" name="imgProduct" id="imgProduct">
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Cadastrar produto</button>
      </div>
      <div>
        <button></button>
      </div>
    </form>

    <div class="row">
      <div class="col-md-12">
        @if(isset($result))
          @if($result)
            <h1>Deu certo campeao!</h1>
          @else
            <h1>Nao deu certo seu cadastro, e foi sua culpa!</h1>
          @endif
        @endif
      </div>

    </div>

  </section>

@endsection