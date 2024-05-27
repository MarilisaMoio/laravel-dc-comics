@extends('layouts.app')

@section('page-title')
    {{ $comic->title }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card" style="width: 40rem;">
                <img src="https://picsum.photos/300/200" class="card-img-top" alt="{{ $comic->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                    <p class="card-text">{{ $comic->description }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $comic->price }}€</li>
                        <li class="list-group-item">{{ $comic->series }}</li>
                        <li class="list-group-item">{{ $comic->title }}</li>
                        <li class="list-group-item">{{ $comic->type }}</li>
                        <li class="list-group-item">{{ $comic->sale_date }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
