@extends('backend.layouts.main')

{{-- @section('styles')
   <link rel="stylesheet" type="text/css" href="{{ asset('css/css/main.css') }}">
@endsection --}}

@section('main')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"
                                 name="prenom" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" 
                                name="nom" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" 
                                name="adresse"  required autocomplete="adresse" autofocus>

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('tel') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" 
                                name="tel" pattern="[0-9]{9}" required autocomplete="tel" autofocus>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateNaissance" class="col-md-4 col-form-label text-md-right">{{ __('date de Naissance') }}</label>

                            <div class="col-md-6">
                                <input id="dateNaissance" type="date" format='DD-MM-YYYY' class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance"  required autocomplete="dateNaissance" autofocus>

                                @error('dateNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lieuNaissance" class="col-md-4 col-form-label text-md-right">{{ __('Lieu de Naissance') }}</label>

                            <div class="col-md-6">
                                <input id="lieuNaissance" type="text"  class="form-control @error('lieuNaissance') is-invalid @enderror" name="lieuNaissance"  required autocomplete="lieuNaissance" autofocus>

                                @error('lieuNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lieuNaissance" class="col-md-4 col-form-label text-md-right">{{ __('Lieu de Naissance') }}</label>

                            <div class="col-md-6">
                                  <label for="genre">{{ __('genre  ') }}</label>
                                    <select id="genre" name="genre" class="form-control" required >
                                        <option value="Masculin">Masculin</option>
                                        <option value="Féminin">Féminin</option>
                                    </select>
                                    @error('genre')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group btn-container">

                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>
                                {{ __('Register') }}
                            </button>
                        </div><br>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<section class="container"  >
    <div class="mx-auto">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 ">
                <h4 class="mx-auto justify-content-center"><i class="fa fa-lg fa-fw fa-user"></i>INSCRIPTION</h4>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="body">
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('prenom') }}</label>

                        <div class="col-md-6">
                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"
                             name="prenom" required autocomplete="prenom" autofocus>

                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>

                        <div class="col-md-6">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" 
                            name="nom" required autocomplete="nom" autofocus>

                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('adresse') }}</label>

                        <div class="col-md-6">
                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" 
                            name="adresse"  required autocomplete="adresse" autofocus>

                            @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('tel') }}</label>

                        <div class="col-md-6">
                            <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" 
                            name="tel"  required  pattern="[0-9]{9}"  autofocus>

                            @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dateNaissance" class="col-md-4 col-form-label text-md-right">{{ __('date de Naissance') }}</label>

                        <div class="col-md-6">
                            <input id="dateNaissance" type="date" format='DD-MM-YYYY' class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance"  required autocomplete="dateNaissance" autofocus>

                            @error('dateNaissance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lieuNaissance" class="col-md-4 col-form-label text-md-right">{{ __('Lieu de Naissance') }}</label>

                        <div class="col-md-6">
                            <input id="lieuNaissance" type="text"  class="form-control @error('lieuNaissance') is-invalid @enderror" name="lieuNaissance"  required autocomplete="lieuNaissance" autofocus>

                            @error('lieuNaissance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lieuNaissance" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                        <div class="col-md-6">
                             
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
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                   
                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <button type="submit"  class="btn btn-primary btn-block">
                                <i class="fa fa-sign-in fa-lg fa-fw"></i>
                                {{ __('S\'INSCRIRE') }}
                            </button>
                        </div>
                    </div>
                <br>
                    
                </form>
            </div>
        </div>
    </div>
        

</section>

@endsection

