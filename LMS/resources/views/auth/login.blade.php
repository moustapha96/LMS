@extends('backend.layouts.main')


@section('main')

<section class="container"  >
    <div class="mx-auto">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 ">
                <h4 class="mx-auto justify-content-center"><i class="fa fa-lg fa-fw fa-user"></i>Se CONNECTER</h4>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="body">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-4">
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

                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                   

                    <div class="form-group  btn-container">
                        <div class="mx-auto col-md-4">
                            <button type="submit"  class="btn btn-primary btn-block">
                                <i class="fa fa-sign-in fa-lg fa-fw"></i>
                                {{ __('se connecter') }}
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


