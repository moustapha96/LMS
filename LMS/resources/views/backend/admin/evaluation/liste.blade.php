@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-users"></i>Gestion des évaluations</h1>
        <p>liste des évaluations</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> 
            <a href="{{ url()->previous() }}" class="btn au-btn-hover btn-primary  ">
            Retour</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.evaluation.add') }}" class="btn btn-success" >ajouter une évaluation</a>
            </li>
    </ul>
  
    </div>
  
  <div class="row">
      <div class="col-md-12">
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
  
          
      <div class="tile table-responsive">        

            <div class="container">
                <div class="card-body">
                    <h2>Liste des évaluations </h2>
                 
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr>
                            <th>Numéro</th>
                            <th>Note</th>
                            <th>date</th>
                            <th>evalation</th>
                            <th>étudiant</th>
                            <th>Cours</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($evaluations as $evaluation)
                          <tr>
                             
                                <td>{{ $evaluation->id }}</td>
                                <td>{{ $evaluation->note }}</td>
                                <td>{{ $evaluation->date }}</td>
                                <td>{{ $evaluation->evaluation }}</td>
                                <td>
                                    <a href="{{ route('student.show',$evaluation->student) }}" class="btn au-btn-hover">
                                        {{ $evaluation->student->user->prenom }} {{ $evaluation->student->user->nom }} 
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('course.view',$evaluation->course) }}" class="btn au-btn-hover">
                                        {{ $evaluation->course->name }} 
                                    </a>
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ route('course.evaluation.show',$evaluation) }}" class="btn au-btn-hover btn-info">detail</a>
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