
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
            <li class="breadcrumb-item"> <a href="{{ url()->previous() }}" class="btn btn-outline-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Retour</a></li>                       
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
                 
                  <div class="">
                      <div class="card">
                          <img class="card-img-top" src="{{ asset($course->image) }}" alt="Card image cap">
                          <div class="card-body">
                              <h4 class="card-title">Nom Cours</h4>
                              <p class="card-text ml-5">{{ $course->name }}</p>
                          </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                <h4 class="card-title">Description</h4>
                                <p class="card-text ml-5">{{ $course->description }}</p>
                              </li>
                              <li class="list-group-item"> 
                                  <h4 class="card-title">Prix du Cours </h4>
                                  <p class="card-text ml-5">{{ $course->price }} Fcfa</p>
                              </li>
                              
                          </ul>
                      </div>
                      
                  </div>
                  
                  
                 
              </div>
        </div>
    </section>
</main> 
@endsection