@extends('templates.template')

@include('subs.header')

@section('title')
    Modifica cocktail
@endsection

@section('main')
    <main>
        <div class="container">
            <form action="{{ route('cocktails.update', $cocktail) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cocktail Name</label>
                    <input type="text" name="name" value="{{ old('name', $cocktail->name) }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cocktail Category</label>
                    <select class="form-select" name="category" aria-label="Default select example">
                        <option selected>Choose Category</option>
                        <option value="dolce" @if (old('category') == 'dolce') selected @endif>Dolce</option>
                        <option value="secco" @if (old('category') == 'secco') selected @endif>Secco</option>
                        <option value="amaro" @if (old('category') == 'amaro') selected @endif>Amaro</option>
                        <option value="aspro" @if (old('category') == 'aspro') selected @endif>Aspro</option>
                        <option value="super alcolico" @if (old('category') == 'super alcolico') selected @endif>Super Alcolico
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alcohol Volume</label>
                    <input type="number" name="alcohol_grade" value="{{ old('alcohol_grade', $cocktail->alcohol_grade) }}"
                        class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Insert an Image(URL)</label>
                    <input type="text" name="thumb" value="{{ old('thumb', $cocktail->thumb) }}" class="form-control"
                        id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </main>
@endsection

@include('subs.footer')
