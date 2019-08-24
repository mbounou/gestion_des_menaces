<?php

namespace App\Http\Controllers;

use App\Models\Menace;
use Illuminate\Http\Request;

use App\Models\CategorieM;
class MenacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menaces = Menace::all();
        
        return view('menaces.index',compact('menaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategorieM::all();

        return view('menaces.create',compact('categories'));
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
            'categorie_id' => 'numeric|required',
            'signature' => 'string|required',
            'nom_menace' => 'string|required'
        ]);

        Menace::create([
            'categorie_id' => $request->get('categorie_id'),
        ]);

        return redirect()->route('menaces.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menace  $menace
     * @return \Illuminate\Http\Response
     */
    public function show(int $menace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menace  $menace
     * @return \Illuminate\Http\Response
     */
    public function edit(int $menace)
    {
        $menace = Menace::find($menace);
        if (empty($menace)) {
            return redirect()->back();
        }
        $categorie = CategorieM::find($menace->categorie_id);
        $categories = CategorieM::where('id','!=',$menace->categorie_id)->get();

        return view('menaces.edit', compact('menace','categorie','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menace  $menace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $menace)
    {
        $menace = Menace::find($menace);
        if (empty($menace)) {
            return redirect()->back();
        } 
        $menace->categorie_id = $request->get('categorie_id');
        $menace->signature = $request->get('signature');
        $menace->nom_menace = $request->get('nom_menace');

        $menace->save();
        
        return redirect()->route('menaces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menace  $menace
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $menace)
    {
        $menace = Menace::find($menace);
        if (empty($menace)) {
            return redirect()->back();
        }

        $menace->delete();
        return redirect()->route('menaces.index');
    }
}
