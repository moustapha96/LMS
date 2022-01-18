@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-question-circle"></i> Gestion des Quiz</h1>
        <p>liste des quiz >> {{ $course->name }}</p>
      </div>
      
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a></li> 
      </ul>
  
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
                @if(($point != null || $point == 0 ) && ( $resultat != null) )
                    
                    @if($course->point_question($point) >= 0 &&  $course->point_question($point) < 50 )
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h4 class="card-title"> Résultat </h4>
                                <p class="card-text">Vous avez échoué , Veuillez réessayer ,
                                    Votre score est de  {{ $course->point_question($point) }} % 
                                    <br>
                                    Point Obtenu : {{ $point }} / {{ $course->total_point }}
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h4 class="card-title"> Résultat </h4>
                                <p class="card-text">Félicitation , Vous avez réussi le test avec un score de {{ $course->point_question($point) }} % 
                                    <br>
                                    Point Obtenu : {{ $point }} / {{ $course->total_point }}
                                </p>
                            </div>
                        </div>
                    @endif
                    
                  
                @endif
                @if($resultat != null )
                    <div class="card text-white bg-white">
                        <div class="card-body">
                            <h4 class="card-title text-secondary text-center">Détails de vos Réponses:</h4>
                            <p class="card-text">
                            
                                @foreach ($resultat as $key => $resul) 
                                    
                                    @foreach ($resul as $ke => $value) 
                                   <h5 class="text-secondary"> Question :<u> {{ $key }} </u></h5>
                                        @foreach ($value as $k => $val)
                                            @if($val[1] == 'vrai' )
                                                <p class="text-primary">
                                                    réponse : {{ $val[0] .' => '.  $val[1] }}
                                                    <br>
                                                </p>
                                            @else
                                                <p class="text-danger">
                                                    réponse : {{ $val[0] .' => '.  $val[1] }}
                                                    <br>
                                                </p>

                                            @endif
                                        
                                        @endforeach
                                    @endforeach
                                    
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endif

              

                <div class="card-body">
                    <h2 class="text-center" > {{ $course->name }}</h2>
                      <hr>
                      <form action="{{ route('admin.course.quiz_doing',$course) }}" method="post">
                          @csrf 
                          <div class="form-group">
                              <div class="card">
                                

                                  @foreach($course->question as $key => $question)
                               
                                    <div class="card-header h5 text-uppercase ">
                                        Question : {{$question->question}} <div class="text-right pull-right "> {{$question->point }} Points </div>
                                    </div>
                                    <div class="card-body">

                                        
                                        <h4 class="card-title">
                                        
                                            @if($question->type == "unique")
                                                @foreach($question->answers as $key => $answer)
                                                    <input type="radio" name="reponse[{{ $question->id }}][]" 
                                                    id="reponse"  question="{{ $answer }}" value="{{ $answer }}">  {{ $answer->answer }}
                                                    <br>
                                                @endforeach
                                            @else
                                        
                                                @foreach($question->answers as $key => $answer)
                                                    <input type="checkbox" name="reponse[{{ $question->id }}][]" 
                                                    id="reponse[]" question="{{ $answer }}" value="{{ $answer }}" >  {{ $answer->answer }}
                                                    <br>
                                                @endforeach
                                            @endif
                                        </h4>
                                    </div>
                             @endforeach
                              </div>
                           
                          </div>
                          <div class="row">
                            <div class="mx-auto align-content-center">
                               <button  type="submit" class="btn btn-primary"> Valider</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </section>
</div>
</main>
@endsection

