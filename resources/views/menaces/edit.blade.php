@extends('layoutsM.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Modifier une Menace</h1>
    </div>

    <div class="card shadow mb-4">
            <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Modifiier une Menace</h1>
            </div>
        <div class="container">
                           
        <form method="POST" action="{{ route('menaces.update',[$menace->id]) }}">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="cat">Catégorie</label>
                    <select name="categorie_id" id="cat" class="form-control">
                        <option value="{{ $categorie->id }}">{{ $categorie->libelle_categorie }}</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->libelle_categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <div class="form-group">
                <input type="text" class="form-control form-control" value="{{ $menace->nom_menace }}" required name="nom_menace" id="exampleInputEmail" placeholder="nom menace">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control" required name="signature" id="exampleInputEmail" placeholder="signature">{{ $menace->signature }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                Enregistrer
                </button>
                <hr>
                
            </form>  
        </div>        
    </div>
        
         
@endsection