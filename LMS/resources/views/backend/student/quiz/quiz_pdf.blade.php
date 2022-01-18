<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/quiz-style.css">
</head>
<body >
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
       <div>
        <div class="mx-auto">
          <p style="text-align: center">
            @php isset($school_name) ? $school_name = $school_name." | " . get_setting('school_name') : $school_name = get_setting('school_name')  ; @endphp
            {{ $school_name }}
          </p>
        </div>
        <div style="text-align: center">
          <p> Cours <strong> {{ $course->name }} </strong> </p>
          <h3> <u>Quiz</u> </h3>
         
        </div>
        <div class="justify-content-lg-start">
          <p><u> Prénom et Nom </u> : <strong class="text-uppercase"> {{ Auth::user()->prenom }} {{ Auth::user()->nom }} </strong></p>
          <p><u> Email </u> :   <strong class="text-uppercase">  {{ Auth::user()->email }}</strong></p>
          <p><u> Date et Lieu de Naissance </u> :  <strong class="text-uppercase"> {{ Auth::user()->dateNaissance }} à {{ Auth::user()->lieuNaissance }}</strong></p>
          <p><u> Date quiz </u> :  <strong class="text-uppercase"> {{ date('Y-m-d H:i:s') }} </strong></p>
        </div>
      </div>

        <div style=" margin-left: 4%" >
            <div class="container">
                @if(($point != null || $point == 0 ) && ( $resultat != null) )
                    
                    @if($course->point_question($point) >= 0 &&  $course->point_question($point) < 50 )
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h4 class="card-title"> Résultat </h4>
                                <p class="card-text" style="text-align: center;color: red" >
                                    Vous avez échoué , Vous n'avez pas atteint les 50% <br>
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
                                <p class="card-text" style="text-align: center;color: green">
                                    Félicitation , Vous avez réussi le test avec un score de {{ $course->point_question($point) }} % 
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
                            <h4 class="card-title text-secondary" style="text-align: center" >Détails de vos Réponses:</h4>
                            <p class="card-text">
                            
                                @foreach ($resultat as $key => $resul) 
                                    
                                    @foreach ($resul as $ke => $value) 
                                   <h5 class="text-secondary"> Question :<u> {{ $key }} </u></h5>
                                        @foreach ($value as $k => $val)
                                            @if($val[1] == 'vrai' )
                                                <p class="text-primary" style="color: green">
                                                    réponse : {{ $val[0] .' => '.  $val[1] }}
                                                    <br>
                                                </p>
                                            @else
                                                <p class="text-danger" style="color: red">
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
                    <h2 class="text-center" style="text-align: center" > {{ $course->name }}</h2>
                      <hr>
                          @csrf 
                          <div class="form-group">
                              <div class="card">
                                

                                  @foreach($course->question as $key => $question)
                               
                                   
                                    <div>
                                        <h4> Question {{ $key+1 }} : {{$question->question}}</h4> 
                                        <p> à {{$question->point }} Points </p>
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
                          
                </div>
            </div>
            
        </div>
 

      </div>
    </div>
  </div>
  
</body>
</html>












