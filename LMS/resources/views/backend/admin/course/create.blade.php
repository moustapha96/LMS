
@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Cours</h1>
          <p>Nouveau Cours </p>
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
                <div class="row">
                    <div class="mx-auto align-content-center">
                        <h3>Ajouter un cours</h3>
                    </div>
                </div>
                <form enctype="multipart/form-data" action="{{ route('course.create') }}" method="POST" >
                    @csrf
    
                    <div class="row">
                        <div class="col-md-6">
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
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="session">Description</label>
                                <input type="text"  name="description" id="description"
                                    class="form-control @error('decription') is-invalid @enderror" 
                                    placeholder="description de ce cours"  required /> 
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <label  for="customFile">Sélectionner l'image</label>
                            <input type="file" name="image" class="form-control" id="customFile">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                        </div>
                        
                    </div>
                
                  
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="session">price</label>
                                <input type="number" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror" 
                                    placeholder="prix du cours" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="teacher">Formateur</label>
                                <select id="teacher" name="teacher" class="form-control" required>
                                    <option ></option>
                                    @foreach($teachers as $teacher )
                                      <option value="{{ $teacher->id }}"> {{ $teacher->user->prenom }} {{ $teacher->user->nom }} </option>
                                    @endforeach
                                </select>
                           </div>
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
