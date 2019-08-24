@extends('layoutsM.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Ajouter une Catégorie</h1>
    </div>

    <div class="card shadow mb-4">
            <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ajouter une categorie</h1>
            </div>
        <div class="container">
                           
        <form method="POST" action="{{ route('categories.update',[$categorie]) }}">
                @csrf
                @method('patch')
                <div class="form-group">
                <input type="text" class="form-control form-control" value="{{ $categorie->libelle_categorie }}" required name="libelle_categorie" id="exampleInputEmail" placeholder="Libellé">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control" required name="description" id="exampleInputEmail" placeholder="Description">{{ $categorie->description }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                Enregistrer
                </button>
                <hr>
                
            </form>  
        </div>        
    </div>
        
         
@endsection