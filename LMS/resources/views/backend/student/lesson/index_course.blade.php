@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Cours</h1>
          <p>Liste de Vos Cours </p>
        </div>
            
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
                        <th>Cours</th>
                        <th>leçons</th>
                        <th>formateur</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($cours_suivis as $cours_suivi)
                      <tr>
                         
                       
                            <td class="title "> {{ $cours_suivi->course->name }} </td>
                           
                          
                            <td> 
                                <a href="{{ route('student.course.lesson',$cours_suivi->course) }}" class="students btn" >
                                    <i class="fa fa-book"></i>{{ $cours_suivi->course->lessons->count() }} Lesson(s)</a>
                            </td>

                            
                            <td> 
                                <a href="{{ route('formateur.view',$cours_suivi->course->teacher) }}" 
                                     class="sub-title btn ">{{ $cours_suivi->course->teacher->user->prenom .' '. $cours_suivi->course->teacher->user->nom }} </a>
                                            
                            </td>

                            <td> 
                                <div class="btn-block">
                                    <a href="{{ route('student.quiz.doing',$cours_suivi->course) }}"
                                      class="btn au-btn-hover btn-outline-warning"><i class="fa fa-question"></i>Quiz</a>
                                    <a href="" 
                                      class=" btn au-btn-hover btn-outline-info "><i class="fa fa-eye"></i></a>
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