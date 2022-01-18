
@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
        <div class="table-responsive">
          
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
             
              <tbody>
                <!-- Le corps du tableau ici -->
                @foreach($lessons as $lesson )
                <tr style="text-align: center;">
                  <td scope="col" style="width: 10%">{{ $lesson->name }} {{ $lesson->files }} {{ $lesson->video }}</td>  
                </tr>
                @endforeach
                <td> 
                    <a class="btn btn-primary" href="#" role="button"> Retour</a>  
                  </td> 
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