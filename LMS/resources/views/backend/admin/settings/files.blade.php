@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-file-archive-o"></i>Fichiers</h1>
        <p>liste des fichiers du systeme</p>
      </div>
     
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
                    <h2>Liste des Fichiers </h2>
                    <hr>
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                       
                        <thead>
                          <tr style="text-align: center">
                            <th>File</th>
                            <th>Name</th>
                            <th>Folder</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($files as $file)
                          <tr style="text-align: center">
                             
                                <td>  
                                    @if ( $file->getExtension() == 'pdf' )
                                    
                                        <a href="{{ asset( $file->getPathname()) }}" target="_blank" 
                                            rel="noopener noreferrer"> {{ $file->getPathname() }} </a>

                                    @elseif( $file->getExtension() == 'mkv' ||  $file->getExtension() == 'mp4' )
                                        
                                       <video width="75%" height="50%" controls preload >
                                            <source src="{{ asset($file->getPathname() ) }}" >
                                        </video>
                                    @endif

                                    @if( $file->getExtension() == 'png'     ||  
                                             $file->getExtension() == 'JPG' || 
                                             $file->getExtension() == 'JPEG' ||
                                             $file->getExtension() == 'jpg'  )

                                        <img src="{{ asset($file->getPathname() ) }}"  width="70" height="70" > 
                                    @endif
                                </td>
                                <td>
                                    {{ $file->getFilename() }}
                                </td>
                                <td> 
                                    {{ $file->getPath() }}
                                </td>

                                <td> <a href="{{ route('files.destroy',$file) }}" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i> </a> </td>
                               
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