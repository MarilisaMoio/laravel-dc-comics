@extends('layouts.app')

@section('page-title')
    Modifica Fumetto
@endsection

@section('content')
<section>
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
        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value={{ old('title',  $comic->title ) }}>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="5" name="description">{{ old('description',  $comic->description ) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value={{ old('thumb',  $comic->thumb ) }}>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" name="price" {{--pattern="^[0-9]+\.[0-9][0-9]$"--}} value={{ old('price',  $comic->price ) }}>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" id="series" name="series" value={{ old('series',  $comic->series ) }}>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <select class="form-control" id="type" name="type">
                    <option value="comic book" {{ old('type',  $comic->type ) === 'comic book' ? 'selected' : '' }}>Comic Book</option>
                    <option value="graphic novel" {{ old('type',  $comic->type ) === 'graphic novel' ? 'selected' : '' }}>Graphic Novel</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" {{--max="9999-12-31"--}} value={{ old('sale_date',  $comic->sale_date ) }}>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection
