@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-users"></i> Gestion du Forum</h1>
        <p>Envoyez et recevez des messages</p>
      </div>
    
    </div>

      <div class="container-fluid mt-100 card p-5">
        <div class="card-header text-center ">  <strong class="h4"> Liste des Messages </strong></div>
        <div class="row">
            <div class="col-md-12">
               
              @foreach($forums as $forum)
            
                  <tr>
                     
                      <td style="width: 90%">
                        <blockquote class=" ">
                          <header class="text-left "> 
                            @if(Auth::user()->id == $forum->user_id )
                              <div title="Source Title  h2">
                                  <a href="{{ route('profil') }}" class="btn  "> Moi </a>
                              </div>

                              @else
                              <cite title="Source Title  text-right">
                                <strong> <a href="{{ route('student.student.show',$forum->user) }}" 
                                  class="btn"> Envoyé par : {{ $forum->user->prenom .' '. $forum->user->nom  }}  </a></strong>  
                              </cite>
                            @endif
                           
                          </header>
                          <p class="mb-0 ml-5 m-4 h3 "> {{ $forum->message }}  </p>
                          <footer class="blockquote-footer h3 text-right"> 
                           Date : {{ date("Y/m/d H:i:s", strtotime( $forum->date )) }}
                          </footer>
                        </blockquote> 
                       
                      </td>
                  </tr>
              @endforeach
              <form action="{{ route('student.forum.add') }}" method="post">
                @csrf
                  <div class="card-footer text-muted ">
                      <div class="row">
                        <div class="form-group col-md-2">
                          <label for="">Message :</label>
                        </div>
                        <div class="form-group col-md-8">
                        
                          <textarea rows="3"
                             class="form-control" name="message" id="message" placeholder="Votre message..."></textarea>
                        </div>
                        <div class="form-group col-md-1">
                            <button class="btn btn-primary" type="submit" >Envoyer</button>
                        </div>
                      </div>
                  </div>
            </form>

            </div>
        </div>
    </div>
</main>
@endsection


@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>




@endsection