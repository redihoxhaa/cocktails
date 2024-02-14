@extends('templates.template')

@include('subs.header')

@section('title')
    {{ $cocktail->name }} - Our cocktails
@endsection

@section('main')
    <main class="single-cocktail">
        <div class="container">
            <a href="{{ route('cocktails.index') }}" class="btn btn-primary my-4">Torna ai cocktail</a>
            <div class="row">
                <div class="col-6">
                    <div class="pic-container">
                        <img src="{{ $cocktail->thumb }}" alt="immagine {{ $cocktail->name }}">
                    </div>
                </div>
                <div class="col-6">
                    <h1>{{ $cocktail->name }}</h1>
                    <p class="badge bg-warning p-2 text-uppercase">{{ $cocktail->category }}</p>
                    <p>Alcohol volume: {{ $cocktail->alcohol_grade }}%</p>

                    @if ($cocktail->is_alcoholic === 1)
                        <p class="badge bg-danger p-2 text-uppercase">Alcoholic</p>
                    @endif
                    @foreach ($cocktail->ingredients as $ingredient)
                        <p class="">{{ $ingredient['name'] }}</p>
                    @endforeach

                </div>
            </div>
        </div>

    </main>
@endsection

@include('subs.footer')
