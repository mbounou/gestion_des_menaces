<?php

namespace App\Http\Controllers;

use App\Models\CategorieM;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategorieM::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'libelle_categorie' => 'string|required',
            'description' => 'string|required'
        ]);
        $data = $request->all();
        CategorieM::create([
            'libelle_categorie'=>$request->get('libelle_categorie'),
            'description' => $request->get('description')
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieM  $categorieM
     * @return \Illuminate\Http\Response
     */
    public function show(int $categorieM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorieM  $categorieM
     * @return \Illuminate\Http\Response
     */
    public function edit(int $categorieM)
    {
        $categorie = CategorieM::find($categorieM);
        return view('categories.edit',compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieM  $categorieM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $categorieM)
    {
        $categorie = CategorieM::find($categorieM);
        if(empty($categorie)){
            return back();
        }
        $categorie->libelle_categorie = $request->get('libelle_categorie');
        $categorie->description = $request->get('description');
        $categorie->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieM  $categorieM
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $categorieM)
    {
        $categorie = CategorieM::find($categorieM);
        if(empty($categorie)){
            return back();
        }
        $categorie->delete();
        return redirect()->route('categories.index');
    }
}
