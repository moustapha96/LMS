@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-files"></i> Gestion des Leçons</h1>
      <p>leçon >> {{ $lesson->name }} </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> 
            <a href="{{ url()->previous() }}" class="btn au-btn-hover btn-primary  ">
           <i class="fa fa-reply" aria-hidden="true"></i> Retour</a></li>
           
    </ul>

</div>



<section class="events-page section-padding-large tile table-responsive">

      <div class=" table-responsive">
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
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-uppercase text-center "> {{ $lesson->name }}</h3>
              </div>
              <div class="card-body ">
                <div class=" text-center ml-4 ">
                  <video width="75%" height="50%" controls preload >
                      <source src="{{ asset( $lesson->video) }}" >
                    </video>
                </div>

                <div class="card-footer">
                  <p class="card-text text-center h3"> PDF du cours : 
                    <strong> 
                      <a href="{{ asset($lesson->file) }}" target="_blank" rel="noopener noreferrer"> {{ $lesson->file }} </a>
                    </strong> </p>
                  
                    <object data="{{  asset($lesson->file) }}" type="application/pdf" 
                        width="100%" height="1000px">
                      <embed src="{{  asset($lesson->file) }}" type='application/pdf'>
                    </object>
                </div>
                
                  
              </div>
              
            </div>
                
      </div>
  
      </div>

</section>

        
</main>
@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/pdfobject.js') }}"></script>
    <script>
        var view = $('#pdf');
        PDFObject.embed({{ $lesson->file }}, view);
    </script>
   
@endsection