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
            <li class="breadcrumb-item"> <a href="{{ url()->previous() }}" class="btn btn-outline-dark ">
               <i class="fa fa-reply" aria-hidden="true"></i> Retour</a></li>


            @if( Auth::user()->student->deja_Inscrit($course) != true ) 
            <li class="breadcrumb-item"> 
                <a href="{{ route('student.course.inscription',$course) }}" class="btn btn-primary ">
                    <i class="fa fa-angellist"></i>
                Suivre</a></li>
              
            @endif

                       
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
                              <li class="list-group-item">
                                <h4 class="card-title">Formateur</h4>
                                <p class="card-text ml-5">
                                    <div class="form-row">
        
                                        <div class="form-group col-md-3 offset-1">
                                            <img src="{{ asset($course->teacher->user->avatar) }}" 
                                                    style="width:200px; height:200px;border-radius: 90% ">
                                        </div>
                    
                                        <div class="form-group col-md-8">
                                            <div class="form-group row">
                                                <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                                                <div class="col-sm-5">
                                                    <input  disabled type="text"  class="form-control" 
                                                    value="{{ $course->teacher->user->prenom }}">
                                                </div>
                    
                                            </div>
                                            <div class="form-group row">
                                                <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                                <div class="col-sm-5">
                                                    <input  disabled type="text"  class="form-control" 
                                                    value="{{ $course->teacher->user->nom }}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-5">
                                                    <input  disabled type="text"  class="form-control" 
                                                    value="{{ $course->teacher->user->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">Carière</label>
                                                <div class="col-sm-5">
                                                    <textarea  disabled  class="form-control" rows="3" >{{ $course->teacher->career }}</textarea>
                                                </div>
                                            </div>
            
                                        </div>
                                        
                                    </div>
                                </p>
                              </li>
                          </ul>
                      </div>
                      
                  </div>
                  
                  
                 
              </div>
        </div>
    </section>
</main> 
@endsection