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
                <div class="col-6 ">
                    <div class="pic-container">
                        <img src="@if ($cocktail->thumb) {{ asset('storage/' . $cocktail->thumb) }}
                        @else https://images.immediate.co.uk/production/volatile/sites/30/2023/04/Strawberry-Marg-c985252.jpg?quality=90&resize=556,505 @endif "
                            alt="immagine"class="img-fluid rounded">
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
