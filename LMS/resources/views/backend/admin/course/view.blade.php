@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Cours</h1>
          <p>cours >> {{ $course->name }} </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ url()->previous() }}" class="btn au-btn-hover btn-primary  ">
                Retour</a></li>           
        </ul>
    
    </div>
  

    <section class="events-page section-padding-large tile table-responsive">

        <div class="tile table-responsive">
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
          
              <div class="container">
                  <div class="text-dark">
                      <h3> Détail du cours </h3>
                   </div>
                   <div class="row">
                      <div class="mx-auto align-content-center">
                          <img src="{{ asset($course->image) }}" 
                             style="width:250px; height: 250px;">   
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="session">Nom du Cours </label>
                              <input type="text"
                                  class="form-control" disabled value="{{ $course->name }}">
                          </div>
                      </div>
                     
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="session">Description</label>
                              <textarea rows="3" class="form-control" disabled >{{ $course->description }}</textarea>
                          </div>
                      </div>
                      
                  </div>
                 
                  <div class="row">
                     
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="session">Prix du Cours</label>
                              <input type="text"
                                  class="form-control" disabled value="{{ $course->price }}">
                          </div>
                      </div>
                  </div>
                 
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="session">Formateur</label>
                              <input type="text"
                                  class="form-control" disabled value="{{ $course->teacher->user->prenom }} {{ $course->teacher->user->nom }}">
                          </div>
                      </div>
                     
                  </div>
              </div>
        </div>
    </section>
</main>
@endsection