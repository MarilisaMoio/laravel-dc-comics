@extends('layouts.app')

@section('page-title')
    Cestino
@endsection

@section('content')
    <div class="row justify-content-center">
        <form action="{{ route('comics.emptyAllBin') }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger" id="deleteAllBtn">Elimina Tutto</button>
        </form>
        @foreach ($delComics as $comic)
            <div class="col-auto">
                <div class="card" style="width: 18rem;">
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
                        <form action="{{ route('comics.emptyBin', ['comic' => $comic->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger js-delete" data-comic-name="{{ $comic->title }}">Elimina Definitivamente</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        @include('modals.bin')
    </div>

@endsection
