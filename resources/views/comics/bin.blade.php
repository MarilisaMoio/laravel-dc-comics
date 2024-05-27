@extends('layouts.app')

@section('page-title')
    Cestino
@endsection

@section('content')
    <div class="row">
        @foreach ($delComics as $comic)
            <div class="col">
                <div class="card" style="width: 16rem;">
                    <img src="https://picsum.photos/300/200" class="card-img-top" alt="{{ $comic->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comic->title }}</h5>
                        <p class="card-text text-truncate">{{ $comic->description }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $comic->price }}€</li>
                            <li class="list-group-item">{{ $comic->series }}</li>
                            <li class="list-group-item">{{ $comic->title }}</li>
                            <li class="list-group-item">{{ $comic->type }}</li>
                            <li class="list-group-item">{{ $comic->sale_date }}</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('comics.show', ['comic' => $comic->id])}}" class="card-link">Mostra altro</a>
                        <a href="{{ route('comics.edit', ['comic' => $comic->id])}}" class="card-link">Modifica</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('comics.emptyBin', ['comic' => $comic->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Elimina Definitivamente</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
