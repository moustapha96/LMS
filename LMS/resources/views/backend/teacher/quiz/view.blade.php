@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des Quiz</h1>
      <p> étudiant >>  {{ $quiz->student->user->prenom .' '.$quiz->student->user->nom }} </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item" > <a href="{{ url()->previous() }}" 
            class="btn btn-outline-dark"> <i class="fa fa-reply" aria-hidden="true"></i>  Retour</a></li>
    </ul>
  </div>

        
    <div class="tile table-responsive">

        <div class="container">
          <div>
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
           <section class="card-header">
                <div class="container">
                    
                    <div class="card">
                      <div class="card-body">
                        <h3 class="card-title text-uppercase text-center"> {{ $quiz->course->name }}</h3>
                        <h5 class="card-subtitle text-muted text-center ">{{ $quiz->student->prenom }} {{ $quiz->student->nom }}</h5>
                      </div>
                      <div class="card-header">
                        <div class="row">
                          <div class="col-md-8">
                            <h4> Prenom & Nom : {{ $quiz->student->user->prenom .' '.$quiz->student->user->nom }} </h4>
                            <h4> Date & lieu de Naissance : {{ $quiz->student->user->dateNaissance .' à '.$quiz->student->user->lieuNaissance }} </h4>
                          </div>
                          <div class="col-md-4">
                            <h5>Note Obtenu  : {{ $quiz->note }}</h5>
                            <h5>Date Quiz: {{ $quiz->date }}</h5>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <p class="card-text h3"> PDF du Quiz</p>
                        <div id="pdf" ></div>
                        <div>
                            <embed src="{{ asset($quiz->file) }}#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="100%">
                           
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

