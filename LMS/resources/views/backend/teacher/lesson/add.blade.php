@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')


<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Leçcons</h1>
          <p>Nouvelle leçon </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Retour</a>
            <a href="{{ route('teacher.course.liste_lessons',$course) }}" 
               class="btn btn-success" > <i class="fa fa-list" aria-hidden="true"></i> Liste Leçons</a>
        </li>
               
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
                <div class="row">
                    <div class="mx-auto align-content-center">
                        <h3>Ajouter une leçon au cours {{ $course->name }}</h3>
                    </div>
                </div>
                <form enctype="multipart/form-data" action="{{ route('teacher.lesson.create',$course) }}" method="POST" >
                    @csrf

                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" 
                                placeholder="name"  required >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        </div>
                       

                        <div class="col-md-12 ">
                            <label  for="customFile">Sélectionner le fichier</label>
                            <input type="file" name="file" class="form-control" id="customFile">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                        </div>

                        <div class="col-md-12 ">
                            <label  for="customvideo">Sélectionner la video</label>
                            <input type="file" name="video" class="form-control" id="customvideo">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                        </div>
                        
                    </div>
                
                
                
                    
                    

                    <div class="row">
                        <div class="mx-auto align-content-center">
                            <button type="submit" class="btn btn-primary">enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
      
        </div>
    
    </section>
</main>
@endsection