@extends('backend.admin.includes.main')

@section('main')
<main class="app-content">  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des utilisateurs</h1>
      <p>Inscrire un étudiant </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> 
            <a href="{{ url()->previous() }}" class="btn au-btn-hover btn-primary  ">
            Retour</a></li>
</div>


  
    <section class="events-page section-padding-large tile table-responsive">
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
        <div class="row">
            <div class=" mx-auto align-content-center">
                <h4 class="mx-auto justify-content-center text-uppercase" ><i class="fa fa-lg fa-fw fa-user">
                </i>INSCRIRE UN étudiant</h4>
            </div>
        </div>

        <div class="body">
            <div class="card-body">
                <form method="POST" action="{{ route('register_student') }}">
                    @csrf

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="nom" >{{ __('prenom') }}</label>
    
                            
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"
                                 name="prenom" required autocomplete="prenom" autofocus>
    
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
                         <div class="form-group col-md-6">
                            <label for="nom" >{{ __('nom') }}</label>
    
                            
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" 
                                name="nom" required autocomplete="nom" autofocus>
    
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                    </div>

                    <div class="row">

                       
                        <div class="form-group col-md-6">
                            <label for="tel" >{{ __('tel') }}</label>

                            
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" 
                                name="tel"  required  pattern="[0-9]{9}"  autofocus>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group col-md-6">
                            <label for="adresse" >{{ __('adresse') }}</label>
    
                          
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" 
                                name="adresse"  required autocomplete="adresse" autofocus>
    
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                    </div>

                    <div class="row">

                       <div class="form-group col-md-6">
                            <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
    
                          
                                <input id="lieuNaissance" type="text"  class="form-control @error('lieuNaissance') is-invalid @enderror" name="lieuNaissance"  required autocomplete="lieuNaissance" autofocus>
    
                                @error('lieuNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>
    
                        <div class="form-group col-md-6">
                            <label for="dateNaissance" >{{ __('date de Naissance') }}</label>
    
                           
                                <input id="dateNaissance" type="date" format='DD-MM-YYYY' class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance"  required autocomplete="dateNaissance" autofocus>
    
                                @error('dateNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                       </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="lieuNaissance" >{{ __('Genre') }}</label>
    
                                 
                                    <select id="sexe" name="sexe" class="form-control" required >
                                        <option ></option>
                                         <option value="Masculin">Masculin</option>
                                        <option value="Feminin">Féminin</option>
                                    </select>
                                    @error('genre')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                         
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="cours" >
                                {{ __('Cours') }}</label>
    
                           
                                    <select id="cours" name="cours" class="form-control" required >
                                        <option ></option>
                                       @foreach($courses as $cours)
                                             <option value="{{ $cours->id }}">{{ $cours->name }}</option>
                                       @endforeach
                                    </select>
                           
                        </div>
                    </div>

                   

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="ine" >
                                {{ __('INE') }}</label>
    
                         
                                <input id="ine" type="number"  class="form-control @error('ine') is-invalid @enderror" 
                                name="ine"  required  autofocus  pattern="[0-9]{13}">
                                @error('ine')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
    
                        <div class="form-group col-md-6">
                            <label for="email" >{{ __('E-Mail Address') }}</label>
    
                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="password">{{ __('Password') }}</label>
    
                          
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
    
                        <div class="form-group col-md-6">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
    
                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class=" mx-auto align-content-center">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-fw fa-user"></i>
                            {{ __('S\'INSCRIRE') }}
                           </button>
                        </div>
                    </div>

                <br>
                    
                </form>
            </div>
        </div>
    </section>

</main>

@endsection

