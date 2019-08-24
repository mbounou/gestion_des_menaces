@extends('layoutsM.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Liste des Menaces</h1>
    </div>

     

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Liste des menaces</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Catégorie</th>
                  <th>Signatiure</th>
                  <th>Nom menace</th>
                  <th>Date de creation</th>
                  <th></th>
                  

                </tr>
              </thead>
              <tbody>
                @foreach ($menaces as $menace)
                    <tr>
                      <td>{{ $menace->categorie_id }}</td>
                      <td>{{ $menace->signature }}</td>
                      <td>{{ $menace->nom_menace }}</td>
                      <td>{{ $menace->created_at }}</td>
                      <td>
                          <a href="{{ route('menaces.edit',[$menace->id]) }}" class="btn btn-info btn-circle btn-lg">
                              <i class="fas fa-edit"></i>
                          </a> 
                          <a href="{{ route('menaces.destroy',[$menace->id]) }}">
                             
                             <button type="submit" class="btn btn-info btn-circle btn-lg">
                                <i class="fas fa-trash-alt"></i>
                             </button> 
                            </a>
                          
                      </td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Date de creation</th>
                    <th></th>
                    <th></th>
                </tr>
              </tfoot>
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>

            <center>
            <a href="{{ route('menaces.create') }}" class="btn btn-info btn-circle btn-lg">
                    <i class="fas fa-plus"></i>
                </a>
            </center>    

            
      </div>
@endsection

@push('js')
    <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/demo/datatables-demo.js"></script>
@endpush