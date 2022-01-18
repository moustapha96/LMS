@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Participants</h1>
          <p>Liste des étudiants qui suivent vos Cours</p>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('teacher.course.index') }}" class="btn btn-outline-primary">Liste de vos Cours</a>
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
                        <th>Cours</th>
                        <th>étudiant</th>
                        <th>Nombre de Quiz</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($student_courses as $student_course)
                      @if ( Auth::user()->teacher->id == $student_course->course->teacher->id )

                               
                            <tr>  
                                    <td class="title ">  
                                        <a href="{{ route('teacher.course.view',$student_course->course) }}" class="btn">
                                                {{ $student_course->course->name }}</a>  </td>
                                    <td>
                                        <a href="{{ route('student.show',$student_course->student) }}" 
                                            class="btn">
                                            {{ $student_course->student->user->prenom.' '.$student_course->student->user->nom }} </a>
                                      
                                    </td>

                                    <td>
                                        {{ $student_course->student->quizzes->count() }}             
                                    </td>

                            </tr>

                      @endif
                     
      
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