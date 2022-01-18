@extends('backend.layouts.main')


@section('main')

<style>
    .row{
        text-align:center;
    }
    .error_number {
        margin-top:10%; 
      font-size: 100px;
      font-weight: 200;
      line-height: 100px;
      color:red;
    }
    .error_number small {
      font-size: 56px;
      font-weight: 700;
    }

    .error_number hr {
      margin-top: 60px;
      margin-bottom: 0;
      width: 50px;
    }

    .error_title {
      margin-top: 40px;
      font-size: 36px;
      font-weight: 400;
    }

    .error_description {
      font-size: 24px;
      font-weight: 400;
    }
  </style>
<div class="container">
      

        <section class="events-page section-padding-large">
            <div class="container">
               
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="error_number">
                    Page non trouvé
                    <hr>
                  </div>
                  <div class="error_title text-muted">
                  La page démandé n'existe pas 
                  </div>
                
                  <div>
                      <a href="{{ route('home') }}" class="btn au-btn-hover">Accueil /</a>
                      <a href="{{ url()->previous() }}"  class="btn au-btn-hover" > retour</a>
                  </div>
                
                </div>
              </div>
            </div>
        </section>
</div>

@endsection
