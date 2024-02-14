@extends('templates.template')

@include('subs.header')

@section('title')
    Crea un nuovo cocktail
@endsection

@section('main')
    <main>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <a href="{{ route('cocktails.index') }}" class="btn btn-primary my-4">Torna ai cocktail</a>
            <form action="{{ route('cocktails.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cocktail Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
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
                        <option value="analcolico" @if (old('category') == 'analcolico') selected @endif>Analcolico </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alcohol Volume</label>
                    <input type="number" name="alcohol_grade" value="{{ old('alcohol_grade') }}" class="form-control"
                        id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <div>
                        <label class="form-label">Ingredients</label>
                    </div>
                    @foreach ($ingredients as $ingredient)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="{{ $ingredient->id }}"
                                name="ingredients[]" id="ingredient-{{ $ingredient->id }}"
                                {{ in_array($ingredient->id, old('ingredients', [])) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="ingredient-{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                        </div>
                    @endforeach

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Insert an Image(URL)</label>
                    <input type="text" name="thumb" value="{{ old('thumb') }}" class="form-control"
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
