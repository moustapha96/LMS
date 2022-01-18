@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-file"></i> Gestion des Leçons</h1>
          <p>Liste des leçons >> {{ $course->name }} </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="{{ url()->previous() }}" class="btn au-btn-hover btn-outline-dark  ">
                                      <i class="fa fa-reply" aria-hidden="true"></i> Retour</a>
               <a href="{{ route('student.quiz.doing',$course) }}" class="btn btn-outline-primary  ">
                                         <i class="fa fa-question-circle" aria-hidden="true"></i> </a>
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
              <div>
                <h4> <u> Cours : </u> {{ $course->name }}</h4>
                <hr>
              </div>
                <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                   
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>fichier</th>
                        <th>video</th>
                       
                        {{-- <th>Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($course->lessons as $lesson)
                      <tr class="text-center" >
                         
                            <td class="title "> {{ $lesson->name }} </td>
                            <td class="title ">
                              @if($lesson->file)
                                    <a href="{{ asset( $lesson->file ) }}" target="_blank" 
                                      rel="noopener noreferrer"> {{ $lesson->file }} </a>
                               
                              @else
                                 <p class="text-center"> pas de pdf </p> 
                              @endif
                            </td>

                            <td class="title ">
                              @if( $lesson->video )
                                <video width="150" height="150" controls preload >
                                    <source src="{{ asset( $lesson->video ) }}" >
                                </video>

                              @else
                                <p class="text-center">pas de Video</p> 
                              @endif
                            </td>
                           
                            {{-- <td> 
                                <div class="btn-block">
            
                                      <a href="" 
                                      class="students btn au-btn-hover btn-outline-info "><i class="fa fa-eye"></i>détail</a>
                                </div>       
                            </td> --}}

                          
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