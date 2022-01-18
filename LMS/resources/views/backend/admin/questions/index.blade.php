@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-question"></i>Questionnaires</h1>
        <p>liste des questions</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> <a href="{{ route('question.create') }}" 
                class="btn au-btn-hover btn-success  ">Ajouter une Question</a></li>           
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
                <div class="card-body">
                    <h2>Liste des Questions </h2>
                    <hr>
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr style="text-align: center">
                            <th>cours</th>
                            <th>question</th>
                            <th>Reponse</th>
                            <th>Point Accordé</th>
                            <th>Détail</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($questions as $question)
                          <tr style="text-align: center">
                             
                                <td>  <a href="{{ route('course.view',$question->course) }}" class="btn">
                                    {{ $question->course->name }} </a> 
                                </td>
                                <td >{{ $question->question }}</td>
                                <td> 
                                    @foreach($question->answers as $answer)
                                    
                                     --  {{ $answer->answer }} =>  {{   $answer->is_correct == 1 ? 'vrai':'false' }}
                                     <br> 
                                     
                                    @endforeach
                                </td>
                                <td> {{ $question->point }} </td>
                                <td>  <a href="{{ route('question.show',$question) }}" class="btn au-btn-hover btn-info">
                                      <i class="fa fa-eye"></i> </a> </td>
                                
                                <td style="text-align: center">
                                    <a href="{{ route('question.destroy',$question) }}" class="btn au-btn-hover btn-danger">
                                        <i class="fa fa-trash"></i> </a>
                                    <a href="{{ route('question.edit',$question) }}" class="btn au-btn-hover btn-warning">
                                        <i class="fa fa-edit"></i> </a>
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