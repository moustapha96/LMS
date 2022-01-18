@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-answer"></i>answernaires</h1>
        <p>liste des options </p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> <a href="{{ url()->previous() }}" 
                class="btn au-btn-hover btn-outline-dark  "><i class="fa fa-reply" aria-hidden="true"></i> Retour</a></li>           
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
                    <h2>Liste des Options </h2>
                    <hr>
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr style="text-align: center">
                            <th>Question</th>
                            <th>Option</th>
                            <th>Correct</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($answers as $answer)
                          <tr style="text-align: center">
                             
                                <td>  
                                    <a href="{{ route('question.show',$answer->question) }}" class="btn">
                                      {{ $answer->question->question }} </a> 
                                </td>
                                <td >{{ $answer->answer }}</td>
                              
                                <td>
                                    @if ($answer->is_correct == 1)
                                        <div class="text-success">
                                            vrai
                                        </div>
                                    @else
                                        <div class="text-danger">Faux</div>
                                    @endif
                                </td>

                                <td style="text-align: center">
                                    <a href="{{ route('answer.destroy',$answer) }}" class="btn au-btn-hover btn-danger">
                                        <i class="fa fa-trash"></i> </a>
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