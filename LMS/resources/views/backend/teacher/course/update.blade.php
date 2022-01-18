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
            <li class="breadcrumb-item"> <a href="{{ url()->previous() }}" class="btn btn-outline-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Retour</a>  
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
                        <h3>Mettre a jour un Cours </h3>
                    </div>
                </div>
                <form enctype="multipart/form-data" action="{{ route('teacher.course.updated',$course) }}" method="POST" >
                    @csrf
        
                    <div class="row mt-2">
                        <div class="mx-auto align-content-center">
                            <img src=" {{ asset($course->image) }}" 
                                style="width:150px; height: 150px; border-radius:50%;">   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $course->name }}"
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="session">Description</label>
                              
                                    <textarea name="description" id="description" 
                                      placeholder="description de ce cours ...." required  
                                      class="form-control @error('description') is-invalid @enderror"
                                      cols="30" rows="3">{{ $course->description }}</textarea>

                                @error('description')
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
                                <label for="session">price</label>
                                <input type="number" name="price" id="price" value="{{ $course->price }}"
                                    class="form-control @error('price') is-invalid @enderror" 
                                    placeholder="prix du cours" required>
                                @error('price')
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
                        <div class="mx-auto align-content-center">
                            <button type="submit" class="btn btn-primary">enregistrer les modification</button>
                        </div>
                    </div>
                </form>
            </div>
        
        </div>
        
    </section>  
          
</main>
@endsection