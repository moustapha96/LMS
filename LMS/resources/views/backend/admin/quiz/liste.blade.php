@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-users"></i> Gestion des Quiz</h1>
        <p>liste des quiz</p>
      </div>
    </div>
  
  
          
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
                <div class="card-body">
                    <h2>Liste des quizs </h2>
                    
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr>
                            <th>Quiz N°</th>
                            <th>Note</th>
                            <th>date</th>
                            <th>fichier</th>
                            <th>étudiant</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($quizs as $quiz)
                          <tr>
                             
                                <td>{{ $quiz->id }}</td>
                                <td>{{ $quiz->note }}</td>
                                <td>{{ $quiz->date }}</td>
                                <td>
                                  <a href="{{ asset($quiz->file) }}" target="_blank" rel="noopener noreferrer"> {{ $quiz->file }}</a>
                                </td>
                                
                                <td>
                                    <a href="{{ route('student.show',$quiz->student) }}" class="btn au-btn-hover">
                                        {{ $quiz->student->user->prenom }} {{ $quiz->student->user->nom }} 
                                    </a>
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ route('admin.course.quiz.show',$quiz) }}" class="btn au-btn-hover btn-info">detail</a>
                                    <a href="{{ route('admin.course.quiz.destroy',$quiz) }}" class="btn btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                          </tr>
          
                          @endforeach
          
                        </tbody>
                      </table>
                </div>
            </div>
        </section>
</div>
</main>
@endsection


@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection