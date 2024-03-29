@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Etudiants</h1>
          <p>étudiant >> {{ $student->user->prenom .' '.$student->user->nom  }} </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>           
        </ul>
    
      </div>

<div class="container">


       <section class="tile table-responsive">
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
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <h2>Profil de {{ $student->user->prenom . ' '. $student->user->nom }}
                            @if ($student->user->status == 1)
                            <span class="badge badge-success float-right"> Compte activé </span>
                            @else
                            <span class="badge badge-danger float-right"> Compte désactivé </span>
                            @endif
                        </h2>
                        <hr width="30%" align="left">
        
        
                        <div class="form-row">
        
                            <div class="form-group col-md-3 offset-1">
                                <img src="{{ asset($student->user->avatar) }}" style="width:200px; height:200px;">
                            </div>
        
                            <div class="form-group col-md-8">
                                <div class="form-group row">
                                    <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                                    <div class="col-sm-5">
                                        <input  disabled type="text"  class="form-control" 
                                        value="{{ $student->user->prenom }}">
                                    </div>
        
                                </div>
                                <div class="form-group row">
                                    <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-5">
                                        <input  disabled type="text"  class="form-control" 
                                        value="{{ $student->user->nom }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                                    <div class="col-sm-5">
                                        <input  disabled type="text"  class="form-control" 
                                        value="{{ $student->user->adresse }}">
                                    </div>
                                </div>
                               
                               
                                <div class="form-group row">
                                    <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                                    <div class="col-sm-5">
                                        <input  disabled type="text"  class="form-control" 
                                        value="{{ $student->user->tel }}">
                                    </div>
                                </div>
                              
                                
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-5">
                                        <input  disabled type="text"  class="form-control" 
                                        value="{{ $student->user->email }}">
                                    </div>
                                </div>
        
                            </div>
                        </div>
        
        
                    </div>
                </div>
              
            </div>
           </section>

     
     
</div>
</main>
@endsection


