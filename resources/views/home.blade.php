@extends('layoutsM.app')

@section('content')
<div class="container-fluid">

    <img src="armando1.gif" style="width:100%; height:100%"/>>

    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <div class="card-header">Dashboard</div> 

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    

</div>
@endsection
