
@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">

    <div class="app-title">
        <div>
        <h1><i class="fa fa-users"></i>Questionnaires</h1>
        <p>éditer une question >> {{ $question->question }}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> <a href="{{url()->previous() }}" class="btn au-btn-hover 
                btn-outline-dark  ">  <i class="fa fa-reply"></i> Retour</a></li>           
    </ul>
    </div>

<div class="card">
    <div class="card-header">
       Ajoute une question
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("question.update",$question) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-12">
                <label class="required" for="course_id">Cours </label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" 
                        name="course_id" id="course_id" required>
                    @foreach($courses as  $course)
                        <option value="{{ $course->id }}"  {{ $question->course_id == $course->id ? "selected":"" }} >{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <label class="required" for="type">Type de Question </label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" 
                        name="type" id="type" required>
                        <option  >Type de reponse....</option>
                        <option value="unique"  {{ $question->type == 'unique' ? "selected":"" }} >Une seul réponse</option>
                        <option value="multiple"  {{ $question->type == 'multiple' ? "selected":"" }}>Plusieur réponses</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label class="required" for="question">Question</label>
                <textarea class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" 
                    name="question" id="question" required>{{ $question->question }}</textarea>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
            </div>

            <div class="form-group col-md-12">
                <label for="Option">Réponses</label>
             
                <div class="col-md-12">
                    @foreach($question->answers as  $key => $answer)
                    <label for="Option">Option {{ $key +1 }} </label>
                  
                        <textarea class="form-control {{ $errors->has('answers') ? 'is-invalid' : '' }}" 
                            name="answers[{{ $key }}]" id="question" >{{ $answer->answer }}</textarea>
                        @if($errors->has('answers'))
                            <div class="invalid-feedback">
                                {{ $errors->first('answers') }}
                            </div>
                        @endif
                           
                        <input type="checkbox" name="is_correct[{{ $key }}]"  id="is_correct" 
                        value="true" {{  $answer->is_correct == 1 ? 'checked': ''  }}  > {{ $answer->is_correct == 1 ? 'vrai': 'faux'  }} 
                        <br>
                    @endforeach

                
                </div>
              </div>

            <div class="form-group col-md-12">
                <label class="required" for="reponse">Point</label>
                <input type="number" class="form-control {{ $errors->has('point') ? 'is-invalid' : '' }}" 
                    name="point" id="point"  value="{{ $question->point }}" required placeholder="le nombre de point" />
                @if($errors->has('point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('point') }}
                    </div>
                @endif
            </div>

            <div class="form-group col-md-12">
                <div class="pull-right">
                    <button class="btn btn-primary" type="submit">
                        Enregistrer les modifications
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</main>


@endsection