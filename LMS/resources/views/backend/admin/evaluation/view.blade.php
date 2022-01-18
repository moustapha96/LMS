@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des Evaluations</h1>
      <p>Cours >> {{ $evaluation->course->name }} >> évaluation  </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
     <li class="breadcrumb-item">
       <a href="{{ url()->previous() }}" class="btn au-btn-hover  btn-outline-dark">Retour</a></li>
     
    </ul>

  </div>



<div class="row">
    <div class="col-md-12">
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
      @endif
      @if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
      @endif
</div>

        
    <div class="tile table-responsive">

        <div class="container">
           <section class="card-header">
                <div class="container">
                    
                    <div class="card">
                      <div class="card-body">
                        <h3 class="card-title text-uppercase "> {{ $evaluation->course->name }}</h3>
                        <h5 class="card-subtitle text-muted text-center ">{{ $evaluation->student->prenom }} {{ $evaluation->student->nom }}</h5>
                      </div>
                      <div class="card-body">
                        <p class="card-text h3"> PDF du l'évaluation</p>
                        <div id="pdf" ></div>
                        <div>
                            {{-- <embed src="{{asset('/uploads/files/'.$lesson->file)}}#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="100%"> --}}
                           
                        </div>
                          
                      </div>
                     
                    </div>
                </div>

           </section>
                        
        </div>
    </section>

</div>
</main>
@endsection

