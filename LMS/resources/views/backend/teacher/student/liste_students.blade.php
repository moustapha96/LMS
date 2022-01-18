@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des Etudiants</h1>
      <p>Liste des étudiants qui suivent le cours de {{ $course->name }}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a class="btn btn-outline-dark" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>           
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
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr>
                            <th>photo</th>
                            <th>prenom</th>
                            <th>nom</th>
                            <th>INE</th>
                            <th>adresse</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($course->student_course as $student_course)
                          <tr>
                             
                                <td>
                                    <a href="{{ route('student.show',$student_course->student) }}">
                                        <img src="{{ asset($student_course->student->user->avatar) }}"
                                        style="width: 50px;height: 50px;border-radius: 50% " alt="">
                                    </a>
                                </td>
                                <td>
                                    {{ $student_course->student->user->prenom }} 
                                </td>
                                <td>{{ $student_course->student->user->nom }} </td>  
                                <td> {{ $student_course->student->ine }} </td>
                                <td> {{ $student_course->student->user->adresse }} </td>

                                <td>

                                    <a href="{{ route('student.show',$student_course->student) }}" class="btn btn-info"> détail</a>

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