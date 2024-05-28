<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $this->validator($formData);

        $newComic = new Comic();
        //$newComic->title = $formData['title'];
        //$newComic->description = $formData['description'];
        //$newComic->thumb = $formData['thumb'];
        //$newComic->price = $formData['price'];
        //$newComic->type = $formData['type'];
        //$newComic->series = $formData['series'];
        //$newComic->sale_date = $formData['sale_date'];
        $newComic->fill($formData);
        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        return view('comics.edit', ['comic' => $comic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comic = Comic::findOrFail($id);

        $formData = $request->all();
        $this->validator($formData);

        //* ricorda di precompilare il form
        $comic->fill($formData);
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id)->delete();

        return redirect()->route('comics.index');
    }

    /**
     * Shows the softly-removed items.
     *
     * @return \Illuminate\Http\Response
     */
    public function bin()
    {
        $delComics = Comic::onlyTrashed()->get();

        return view('comics.bin', compact('delComics'));
    }

    /**
     * Completely delete the item in bin.
     *
     * @param  int  $comic
     * @return \Illuminate\Http\Response
     */
    public function emptyBin($comic)
    {
        $delComic = Comic::withTrashed()->findOrFail($comic)->forceDelete();

        return redirect()->route('comics.bin');
    }

    /**
     * Completely delete all the items in bin.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyAllBin()
    {
        $delComics = Comic::onlyTrashed()->forceDelete();

        return redirect()->route('comics.index');
    }

    /**
     * Completely delete all the items in bin.
     *
     * @param  $input
     * @return \Illuminate\Http\Response
     */
    private function validator($input){

        $rules = [
            'title' => 'required|min:2|max:250',
            'description' => 'required|min:10|max:2000',
            'thumb' => 'required|min:4|ends_with:.png,.jpg',
            'price' => 'required|decimal:2|numeric|max:999999.99',
            'type' => 'required|min:2|max:30',
            'series' => 'required|min:2|max:30',
            'sale_date' => 'required|date',
        ];

        $messages = [
            'required' => 'Il campo ":attribute" è vuoto, ma è necessario compilarlo.',
            'min' => 'Il campo ":attribute" necessita di almeno :min caratteri.',
            'max' => [
                'numeric' => 'Il campo ":attribute" accetta un valore massimo di :max.',
                'string' => 'Il campo ":attribute" accetta un massimo di :max caratteri.',
            ],
            'ends_with' => 'Nel campo ":attribute" manca l\'estensione finale o essa non coincide con le seguenti: :values.',
            'numeric' => 'Il campo ":attribute" accetta solo valori numerici.',
            'decimal' => 'Il campo ":attribute" necessita di due valori dopo il punto, o è stata inserita una virgola al posto del punto.',
            'date' => 'Il campo ":attribute" non è una data valida.',
        ];

        $validator = Validator::make($input, $rules, $messages)->validate();

        return $validator;
    }
}
