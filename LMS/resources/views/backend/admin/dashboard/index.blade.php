
@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Dashboard</h1>
      <p>Acceuil</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <a class="btn au-btn-hover active">Accueil</a>
    </ul>

  </div>


        
    <div class="tile table-responsive">   
    </div>
</main>
  @endsection



  @section('scripts')
  <!-- Data table plugin-->
  <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>

  @endsection





