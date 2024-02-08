@extends('templates.template')

@include('subs.header')

@section('title')
    Titolo di prova
@endsection

@section('main')

<form action="{{route('cocktails.store')}}" method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Cocktail Name</label>
      <input type="text"name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Cocktail Category</label>
    <select class="form-select" name="category" aria-label="Default select example">
        <option selected >Choose Category</option>
        <option value="dolce">Dolce</option>
        <option value="secco">Secco</option>
        <option value="amaro">Amaro</option>
        <option value="aspro">Aspro</option>
        <option value="super alcolico">Super Alcolico</option>
      </select>
    </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Alcohol Volume</label>
        <input type="number"name="alcohol_grade" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Insert an Image(URL)</label>
        <input type="text" name="thumb" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>

@endsection

@include('subs.footer')
