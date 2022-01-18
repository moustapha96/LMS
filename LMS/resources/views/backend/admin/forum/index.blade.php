@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-users"></i> Gestion du Forum</h1>
        <p>liste des discussions</p>
      </div>
      {{-- <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> 
            <a href="{{ url()->previous() }}" class="btn au-btn-hover btn-primary  ">
            Retour</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.forum.add') }}" class="btn btn-success" >ajouter un forum</a>
            </li>
      </ul> --}}
  
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
                    <h2>Liste des discussions </h2>
                    
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr style="text-align: center">
                            <th>id</th>
                            <th>user</th>
                            <th>date</th>
                            <th>message</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($forums as $forum)
                          <tr style="text-align: center">
                             
                                <td>{{ $forum->id }}</td>
                                <td >
                                          
                                    @if($forum->user->role == 'teacher')
                                        <a href="{{ route('formateur.view',$forum->user->teacher ) }}" class="au-btn-hover btn ">
                                            {{ $forum->user->prenom.' '.$forum->user->nom }} </strong></a>
                                    @endif
                                    @if($forum->user->role == 'student')
                                        <a href="{{ route('student.show',$forum->user->student ) }}" class="au-btn-hover btn  ">
                                            {{ $forum->user->prenom.' '.$forum->user->nom }} </strong></a>
                                    @endif
                                    @if($forum->user->role == 'admin')
                                        <a href="{{ route('admin.show',$forum->user ) }}" class="au-btn-hover btn  ">
                                            {{ $forum->user->prenom.' '.$forum->user->nom }} </strong></a>
                                    @endif
                                   
                                </td>
                              
                                <td>{{ $forum->date }}</td>
                                <td> {{ $forum->message }} </td>
                                
                                <td style="text-align: center">
                                    <a href="{{ route('admin.forum.delete',$forum) }}" class="btn au-btn-hover btn-danger">
                                    <i class="el el-trash"></i> </a>
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