@extends('backend.admin.includes.main')


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des utilisateurs</h1>
          <p>Liste des utilisateurs </p>
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
                <!-- Heading Page -->
           
                <section class="events-page section-padding-large">
                    <div class="container">
                        <div class="card-body">
                          
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                               
                                <thead>
                                  <tr>
                                    <th>prenom </th>
                                    <th>nom</th>
                                    <th>adresse</th>
                                    <th>email</th>
                                    <th>tel</th>
                                    <th>rôle</th>
                                    <th>Compte</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($users as $user)
                                  <tr>
                                  
                                        <td>{{ $user->prenom }}</td>
                                        <td>{{ $user->nom}}</td>
                                        <td>{{ $user->adresse}}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->tel}}</td>
                                        <td> 
                                            @if($user->role == 'admin')
                                              admin
                                            @endif
                                            @if($user->role == 'teacher')
                                               formateur
                                            @endif
                                            @if($user->role == 'student')
                                               étudiant
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->status == 1)
                                              <span class="badge badge-success"> Compte activé </span>
                                            @else
                                              <span class="badge badge-danger"> Compte désactivé </span>
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                          
                                            @if($user->role == 'teacher')
                                                <a href="{{ route('formateur.view',$user->teacher ) }}" class="au-btn-hover btn btn-info">
                                                    détail </strong></a>
                                            @endif
                                            @if($user->role == 'student')
                                                <a href="{{ route('student.show',$user->student ) }}" class="au-btn-hover btn btn-info ">
                                                    détail </strong></a>
                                            @endif
                                            @if($user->role == 'admin')
                                                <a href="{{ route('admin.show',$user ) }}" class="au-btn-hover btn btn-info ">
                                                    détail </strong></a>
                                            @endif
                                           
                                        </td>
                                  </tr>
                  
                                  @endforeach
                  
                                </tbody>
                              </table>
                        </div>
                    </div>
                </section>
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