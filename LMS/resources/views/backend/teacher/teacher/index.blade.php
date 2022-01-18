@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des étudiants</h1>
          <p>liste des formateurs</p>
        </div>
    
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a class="btn btn-success" 
                href="{{ route('user.add.teacher') }}" >  
                  ajouter un Formateur
              </a> 
            </li>
        </ul>
    
    
    </div>
    

<div class="container">
     

        <section class="events-page section-padding-large tile table-responsive ">
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
                            <th>email</th>
                            <th>prenom</th>
                            <th>nom</th>
                            <th>adresse</th>
                            <th>Tel</th>
                            <th>Carrière</th>
                            <th>Matricule</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($teachers as $teacher)
                          <tr>
                             
                                <td>{{ $teacher->user->email }}</td>
                                <td>{{ $teacher->user->prenom }}</td>
                                <td>{{ $teacher->user->nom }}</td>
                                <td>{{ $teacher->user->adresse }}</td>
                                <td>{{ $teacher->user->tel }}</td>
                                <td>{{ $teacher->career }}</td>
                                <td>{{ $teacher->matricule }}</td>
                                <td>
                                    <a href="{{ route('formateur.view',$teacher) }}" class="btn btn-info au-btn-hover">détail</a>
                                    <a href="{{ route('formateur.update',$teacher) }}" class="btn btn-warning au-btn-hover">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
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