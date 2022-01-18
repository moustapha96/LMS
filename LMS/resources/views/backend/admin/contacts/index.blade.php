@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des Contacts</h1>
      <p>liste des contacts</p>
    </div>

    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a class="btn btn-primary" 
             href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour </a></li>
    </ul>


  </div>

<div class="container">
       
        <section class="events-page section-padding-large tile table-responsive ">
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
            <ul class="nav nav-tabs nav-fill">

                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#p1">Contacts </a></li>  
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#p2">Réponses</a></li>
                
            </ul>
              
              <div class="tab-content bs-component card ">
               
                <div class="tab-pane tab-pane fade show active" id="p1">
                    <div class="card-header">
                        <h4 class="card-title">Contacts Reçus</h4>
                    </div>
                    <div class="card-body">
          
           
                        <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                           
                            <thead>
                              <tr>
                                <th>Nom complet</th>
                                <th>email</th>
                                <th>Adresse</th>
                                <th>Sujet</th>
                                <th>Commentaire</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($contacts as $contact)
                             
                                @if($contact->email != Auth::user()->email  )
                                    
                                
                                <tr>
                                    
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->adresse }}</td>
                                        <td>{{ $contact->sujet }}</td>
                                        <td>{{ $contact->message }}</td>
                                    
                                        <td style="text-align: center">
                                            <a href="{{ route('contact.delete',$contact) }}" class="btn au-btn-hover btn-danger">supprimé</a>
                                            <a data-toggle="modal" data-target="#model-{{ $contact->id }}" class="btn au-btn-hover btn-outline-primary">
                                            <i class="fa fa-send" aria-hidden="true"></i> </a>
                                        </td>
                                </tr>
                              @endif
    
                              {{-- modal reponse contact --}}
            
                                    <!-- Modal -->
                                    <div class="modal fade" id="model-{{ $contact->id }}" tabindex="-1" role="dialog" 
                                                aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title">Contact : {{ $contact->email }} </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('contact.response',$contact) }}" method="POST"  >
                                                        @csrf
                                                        <div class="container-fluid">
                                                            <div class="form-group">
                                                              <label for="Sujet">Sujet</label>
                                                              <input type="text"
                                                                class="form-control" name="sujet" id="sujet" class="form-control @error('sujet') is-invalid @enderror">
                                                                    @error('sujet')
                                                                        <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                             </div>

                                                            <div class="form-group">
                                                              <label for="reponse">Commentaire</label>
                                                              <textarea class="form-control" required name="response" id="reponse" rows="3"></textarea>
                                                            </div>
                                                            
                                                      
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary au-btn-buy ">envoyer</button>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        $('#exampleModal').on('show.bs.modal', event => {
                                            var button = $(event.relatedTarget);
                                            var modal = $(this);
                                        });
                                    </script>
    
                              {{-- fin modal  --}}
                              @endforeach
              
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane tab-pane fade show" id="p2">
                    <div class="card-header">
                        <h4 class="card-title">Réponses </h4>
                    </div>
                    <div class="card-body">
          
           
                        <table class="table table-hover table-bordered" id="reponseTable" width="100%">
                           
                            <thead>
                              <tr>
                                <th>Envoyé par</th>
                                <th>email</th>
                                <th>Adresse</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($contacts as $contact)
                             
                                @if($contact->email == Auth::user()->email )
                                    
                                
                                <tr>
                                    
                                        <td>Toi même</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->adresse }}</td>
                                        <td>{{ $contact->sujet }}</td>
                                        <td>{{ $contact->message }}</td>
                                    
                                        <td style="text-align: center">
                                            <a href="{{ route('contact.delete',$contact) }}" class="btn au-btn-hover btn-danger">supprimé</a>
                                        </td>
                                </tr>
                              @endif
    
                           
                             @endforeach
              
                            </tbody>
                        </table>
                    </div>
                </div>
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
<script type="text/javascript">$('#reponseTable').DataTable();</script>

@endsection