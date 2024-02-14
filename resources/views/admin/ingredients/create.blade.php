@extends('templates.template')

@include('subs.header')

@section('title')
    Crea ingredient
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

            <a href="{{ route('ingredients.index') }}" class="btn btn-primary my-4">Torna ai ingredients</a>
            <form action="{{ route('ingredients.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ingredient Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>

    </main>
@endsection

@include('subs.footer')
