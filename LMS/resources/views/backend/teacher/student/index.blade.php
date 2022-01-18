@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des étudiants</h1>
      <p>liste des étudiants</p>
    </div>

    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a class="btn btn-outline-dark" 
             href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour </a></li>
        <li class="breadcrumb-item">
            <a class="btn btn-success" 
            href="{{ route('user.add.student') }}" >  
              ajouter un étudiant
          </a> 
        </li>
    </ul>


  </div>

<div class="container">
      

        <section class="events-page section-padding-large tile table-responsive ">
            <div class="container">
                <div class="card-body">
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
                   
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr>
                            <th>INE</th>
                            <th>email</th>
                            <th>prenom</th>
                            <th>nom</th>
                            <th>adresse</th>
                            <th>Tel</th>
                            <th>Cours Suivi</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($students as $student)
                          <tr>
                             
                                <td>{{ $student->ine }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td>{{ $student->user->prenom }}</td>
                                <td>{{ $student->user->nom }}</td>
                                <td>{{ $student->user->adresse }}</td>
                                <td>{{ $student->user->tel }}</td>
                                <td>
                                    <a href="{{ route('student.course.lesson',$student) }}" class="btn btn-warning au-btn-hover">cours</a>
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ route('student.show',$student) }}" class="btn au-btn-hover btn-info">detail</a>
                                    <a href="{{ route('student.update',$student) }}" class="btn au-btn-hover btn-waring">
                                     <i class="fa fa-edit" aria-hidden="true"></i> </a>
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