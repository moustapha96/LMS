@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')


<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Leçons</h1>
          <p>leçon >>  {{ $lesson->name }} </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="{{ url()->previous() }}" class="btn au-btn-hover btn-primary  ">
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
                <div class="row">
                    <div class="mx-auto align-content-center">
                        <h3>Modifier {{ $lesson->name }} du cours {{ $lesson->course->name }}</h3>
                    </div>
                </div>
                <form enctype="multipart/form-data" action="{{ route('admin.lesson.updated',$lesson) }}" method="POST" >
                    @csrf

                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" 
                                placeholder="name"  required  value="{{ $lesson->name }}" >
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