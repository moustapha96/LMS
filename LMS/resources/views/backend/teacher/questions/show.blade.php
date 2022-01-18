
@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-question"></i>Questionnaires</h1>
        <p> Cours >>  {{ $question->course->name }}</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> <a href="{{url()->previous() }}" class="btn au-btn-hover 
                btn-outline-dark  ">  <i class="fa fa-reply"></i> Retour</a></li>           
       </ul>
    </div>
  
  
          
      <div class="tile table-responsive">
            <div class="container">
                <div class="card-body">
                    <div class="card-header text-center "> <h2>Cours : {{ $question->course->name }}</h2> </div>
                    <hr>
                       

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="h4 card-header" for="type">Type de Question </label>
                                <div class="mt-3 text-center border h5">
                                    {{ $question->type }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="h4 card-header" for="reponse">Nombre de Point</label>
                                <div class="mt-3 text-center  border h5">
                                    {{ $question->point }} 
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="h4 card-header " for="question">Question</label>
                                <div class="mt-3 text-center border h5">
                                    {{ $question->question }}
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <label class="h4 card-header">Options de réponse</label>
                                <td> 
                                    <div class="mt-3 text-bold h5 text-center border ">
    
                                        @foreach($question->answers as $answer)
                                                
                                             --  {{ $answer->answer }} =>  {{   $answer->is_correct == 1 ? 'vrai':'false' }}
                                             <br> 
                                             
                                         @endforeach
                                    </div>
                                </td>
                               
                            </div>
                        </div>
                        

                       
                                    
                  
                </div>
            </div>
        </section>
</div>
</main>
@endsection
