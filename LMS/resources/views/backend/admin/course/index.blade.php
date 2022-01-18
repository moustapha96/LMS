@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Gestion des Cours</h1>
          <p>Liste des Cours </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ route('admin.course.add') }}" class="btn au-btn-hover btn-success  ">ajouter un cours</a></li>           
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
                        <th>prix</th>
                        <th>Abonnés</th>
                        <th>Quiz</th>
                        <th>leçons</th>
                        <th>formateur</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($courses as $course)
                      <tr>
                         
                            <td class="title "> {{ $course->name }} </td>
                            
                            <td > 
                                @if($course->price == 0 )
                                    <span class="price free">Gratuit</span>
                                @else
                                    <span class="price notfree">{{ $course->price }} </span> 
                                @endif
                            </td>
                           
                            <td> 
                                <a href="{{ route('admin.course.liste_students',$course) }}" class="comments btn">
                                    <i class="fa fa-user"></i>{{ $course->student_course->count() }} Student(s)</a>
                             </td>

                            <td> 
                               <a href="{{ route('admin.course.quiz',$course) }}" class="students  btn">
                                    <i class="fa fa-question"></i> {{ $course->quiz->count() }} Quiz</a>
                            </td>


                            <td> 
                                <a href="{{ route('admin.course.liste_lessons',$course) }}" class="students btn" >
                                    <i class="fa fa-book"></i>{{ $course->lessons->count() }} Lesson(s)</a>
                            </td>

                            
                            <td> 
                                <a href="{{ route('formateur.view',$course->teacher) }}" 
                                     class="sub-title btn ">{{ $course->teacher->user->prenom }} {{ $course->teacher->user->nom }} </a>
                                            
                            </td>

                            <td> 
                                <div class="btn-block">
                                    <a href="{{ route('course.update',$course) }}"
                                      class="comments btn au-btn-hover btn-outline-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('course.view', $course) }}" 
                                      class="students btn au-btn-hover btn-outline-info "><i class="fa fa-eye"></i></a>
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