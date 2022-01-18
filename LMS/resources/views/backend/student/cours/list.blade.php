
@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des Cours</h1>
      <p>Liste des Cours Disponibles </p>
    </div>
        
</div>
  <div class="row">
    <div class="col-md-12" >
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
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
        <div class="table-responsive">
          <h1 style="text-align: center;"> Cours Disponible</h1>
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
              <thead class="thead-dark">
                <tr style="text-align: center;">
                  <th  scope="col" style="width: 10%"> Cours </th>
                  <th  scope="col" style="width: 10%">  Leçon </th>
                  <th  scope="col" style="width: 10%">  Prix </th>
                  <th  scope="col" style="width: 10%">  Action </th>
                </tr>
              </thead>
              <tbody>
                <!-- Le corps du tableau ici -->
                @foreach($courses as $course)
                  <tr style="text-align: center;">
                    <td scope="col" style="width: 10%">
                       <a href="{{ route('student.course.show',$course) }}" class="btn" > {{ $course->name }} </a> </td>  
                    
                    <td>  
                    
                      @if( Auth::user()->student->deja_Inscrit($course) == true ) 
                          <a href="{{ route('student.course.lesson',$course) }}" class="btn"> {{ $course->lessons->count() }} leçon(s)</a> 
                      @else
                        {{ $course->lessons->count() }} leçon(s) 
                      @endif

                    </td>  
                    <td scope="col" style="width: 10%">
                        @if ($course->price == 0)
                            <div class="text-primary"> Gratuit </div> 
                        @else
                        <div class="text-danger">
                          {{ $course->price }} Fcf
                        </div>
                          
                        @endif
                    </td> 
                    <td> 
                      @if( Auth::user()->student->deja_Inscrit($course) == true ) 
                         <strong> déja inscrit </strong>
                      
                      @else
                        <a class="btn btn-outline-primary" href="{{ route('student.course.inscription',$course) }}" role="button">
                          s'incrire</a> 
                      
                      @endif
                    </td> 
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection


@section('scripts1')

@endsection