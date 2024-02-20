@extends('templates.template')

@include('subs.header')

@section('title')
    Titolo di prova
@endsection

@section('main')
    <main>
        <div class="container">
            <ul class="row">

                @foreach ($cocktails as $cocktail)
                    <div class="cocktail-card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4 img-container">
                                <img src="@if ($cocktail->thumb) {{ $cocktail->thumb }}
                                    @else https://images.immediate.co.uk/production/volatile/sites/30/2023/04/Strawberry-Marg-c985252.jpg?quality=90&resize=556,505 @endif "
                                    alt="immagine" class="img_cocktail">
                            </div>
                            <div class="col-md-8 p-4">
                                <div class="card-body">
                                    <p class="card-text"><small
                                            class="text-body-secondary">{{ $cocktail->category }}</small>
                                    </p>
                                    <h5 class="card-title">{{ $cocktail->name }}</h5>
                                    @if ($cocktail->is_alcoholic === 1)
                                        <p class="badge text-bg-danger "> Vietato ai minori di 18 anni </p>
                                    @endif
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('cocktails.edit', $cocktail) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('cocktails.destroy', $cocktail->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" name="DELETE">Delete</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <li class="col-4 py-2 px-3 d-flex">
                        <div class="card px-3 py-3 w-100 d-flex">
                            <div class="w-50">
                                <h4>{{ $cocktail->name }}</h4>
                                <p>{{ $cocktail->category }}</p>
                                <p>Gradazione alcoolica: {{ $cocktail->alcohol_grade }}%</p>
                                @if ($cocktail->is_alcoholic === 1)
                                    <p class="badge text-bg-danger "> Vietato ai minori di 18 anni </p>
                                @endif
                            </div>
                            <div class="w-50">
                                <div class="pic-container">
                                    <img src="@if ($cocktail->thumb) {{ $cocktail->thumb }}
                                    @else https://images.immediate.co.uk/production/volatile/sites/30/2023/04/Strawberry-Marg-c985252.jpg?quality=90&resize=556,505 @endif "
                                        alt="immagine">
                                </div>
                            </div>
                            <a href="{{ route('cocktails.edit', $cocktail) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('cocktails.destroy', $cocktail->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button name="DELETE">Delete</button>

                            </form>
                        </div>

                    </li> --}}
                @endforeach

            </ul>
        </div>
    </main>
    <a class="btn btn-primary" href="{{ route('cocktails.create') }}">Create a new cocktail</a>
@endsection

@include('subs.footer')
