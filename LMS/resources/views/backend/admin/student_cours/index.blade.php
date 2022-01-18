@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Cours Suivi</h1>
          <p>Liste des Cours Suivi</p>
        </div>
        {{-- <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ route('course.add') }}" class="btn au-btn-hover btn-success  ">ajouter un cours</a></li>           
        </ul> --}}
    
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
                        <th>Prix Cours</th>
                        <th>étudiant</th>
                        <th>formateur</th>
                        <th>note</th>
                        <th>date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($student_courses as $student_course)
                      <tr>
                         
                            <td class="title ">  
                                <a href="{{ route('course.view',$student_course->course) }}" class="btn"> {{ $student_course->course->name }}</a>  </td>
                            
                            <td > 
                                @if($student_course->course->price == 0 )
                                    <span class="price free">Gratuit</span>
                                @else
                                    <span class="price notfree">{{ $student_course->course->price }} </span> 
                                @endif
                            </td>
                           
                            <td> 
                                <a href="{{ route('student.show',$student_course->student) }}" 
                                    class="btn">
                                 {{ $student_course->student->user->prenom.' '.$student_course->student->user->nom }} </a>
                            </td>
                            <td> 
                                <a href="{{ route('formateur.view',$student_course->course->teacher) }}" 
                                     class="sub-title btn ">
                                     {{ $student_course->course->teacher->user->prenom }} {{ $student_course->course->teacher->user->nom }} </a>
                                            
                            </td>
                            <td> {{ $student_course->note }} </td>
                            <td> {{ $student_course->date }} </td>
                           
                            <td>    
                                <div class="btn-block">
                                    <a href="{{ route('course.suivi.delete',$student_course) }}"
                                      class="comments btn au-btn-hover btn-outline-danger"><i class="fa fa-trash"></i></a>
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