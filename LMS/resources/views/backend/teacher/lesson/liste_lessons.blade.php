@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-file"></i> Gestion des Leçons</h1>
          <p>Liste leçons >> {{ $course->name }} </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
              <a href="{{ url()->previous() }}" class="btn btn-outline-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Retour</a>
                    <a href="{{ route('teacher.lesson.add',$course) }}" class="btn btn-success" > <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                </li>
        </ul>
    
    </div>

  
    <section class="events-page section-padding-large tile table-responsive">
        <div class="container">
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
            <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                   
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>fichier</th>
                        <th>Video</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($course->lessons as $lesson)
                      <tr>
                         
                            <td class="title "> {{ $lesson->name }} </td>
                            
                            <td class="title ">
                                <cite title="Source Title">
                                    
                                    <a href="{{ asset($lesson->file) }}" target="_blank" rel="noopener noreferrer">{{ $lesson->file }}</a>
                                    <object data="{{  asset($lesson->file) }}" type="application/pdf" 
                                      width="100%" height="100px">
                                    <embed src="{{  asset($lesson->file) }}" type='application/pdf'>
                                  </object>
                                </cite>
                            </td>
                            <td class="title ">
                              <video width="75%" height="50%" controls preload >
                                <source src="{{ asset( $lesson->video) }}" >
                              </video>
                            </td>
                           
                            <td> 
                                <div class="btn-block">

                                    <a href="{{ route('teacher.lesson.update',$lesson) }}"
                                      class="comments btn au-btn-hover btn-outline-warning"><i class="fa fa-edit"></i></a>
                                    
                                      <a href="{{ route('teacher.lesson.show',$lesson) }}" 
                                      class="btn au-btn-hover btn-outline-info "><i class="fa fa-eye"></i></a>

                                      <a href="{{ route('teacher.lesson.delete',$lesson) }}" 
                                      class="btn btn-outline-danger">
                                      <i class="fa fa-trash"></i></a>
                                </div>       
                            </td>

                          
                      </tr>
      
                      @endforeach
      
                    </tbody>
                  </table>
            </div>
        </div>
    </section>
          
</main>
@endsection


@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection