@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des Etudiants</h1>
      <p>liste des cours suivis </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>
  </ul>

  </div>

<div class="container">

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
                    <h2>Liste des Cours suivi par {{ $student->user->prenom }} {{ $student->user->nom }}</h2>
                      <hr>
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr>
                            <th>nom</th>
                            <th>description</th>
                            <th>prix</th>
                            <th>formateur</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($student->student_course as $student_course)
                          <tr>
                             
                                <td>{{ $student_course->course->name }}</td>
                                <td>{{ $student_course->course->description }}</td>  
                                <td> {{ $student_course->course->price }} </td>
                                <td>
                                    <a href="{{ route('formateur.view',$student_course->course->teacher) }}" class="btn au-btn-hover">
                                        {{ $student_course->course->teacher->user->prenom }} {{ $student_course->course->teacher->user->nom }} 
                                    </a>
                                </td>
                              

                                <td style="text-align: center">
                                    <a href="{{ route('course.view',$student_course->course) }}" class="btn au-btn-hover btn-outline-info ">detail</a>
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