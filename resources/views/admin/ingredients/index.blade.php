@extends('templates.template')

@include('subs.header')

@section('title')
    Titolo di prova
@endsection

@section('main')
    <main>
        <div class="container">
            <a href="{{ route('cocktails.index') }}" class="btn btn-primary my-4">Show Cocktails</a>
            <ul class="row">
                @foreach ($ingredients as $ingredient)
                    <li class="col-4 py-2 px-3 d-flex">
                        <div class="card px-3 py-3 w-100 d-flex">
                            <div class="w-50">
                                <a href="{{ route('ingredients.show', $ingredient) }}">
                                    <h4>{{ $ingredient->name }}</h4>
                                </a>

                                <a href="{{ route('ingredients.edit', $ingredient) }}" class="btn btn-primary">Edit</a>
                                <form action={{ route('ingredients.destroy', $ingredient->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button name="DELETE">Delete</button>

                                </form>
                            </div>

                    </li>
                @endforeach

            </ul>
        </div>
    </main>
    <a class="btn btn-primary" href="{{ route('ingredients.create') }}">Create a new ingredient</a>
@endsection

@include('subs.footer')
