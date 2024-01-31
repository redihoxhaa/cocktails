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
               <li class="col-4 py-2 px-3 d-flex">
                <div class="card px-3 py-3 w-100 d-flex">
                   <div class="w-50">
                    <h4>{{$cocktail->name}}</h4>        
                    <p>{{$cocktail->category}}</p>
                    <p>Gradazione alcoolica: {{$cocktail->alcohol_grade}}%</p>
                    @if ($cocktail->is_alcoholic === 1)
                    <p class="badge text-bg-danger "> Vietato ai minori di 18 anni </p>                           
                    @endif
                   </div>
                   <div class="w-50">
                    <div class="pic-container">
                        <img src="https://images.immediate.co.uk/production/volatile/sites/30/2023/04/Strawberry-Marg-c985252.jpg?quality=90&resize=556,505" alt="">
                    </div>
                   </div>
                </div>
               </li>
               @endforeach
                
            </ul>
        </div>
    </main>
@endsection

@include('subs.footer')
