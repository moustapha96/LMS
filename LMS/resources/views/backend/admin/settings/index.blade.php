@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Paramètres </h1>
      <p>liste des paramétres du système</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
       <p class="h3" >Paramètres</p>
    </ul>

  </div>

  @if(session()->has('messageSuccess'))
  <div class="alert alert-success">
    {{ session()->get('messageSuccess') }}
  </div>
  @endif

<div class="row">
    <div class="col-md-12">
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

    <section class="tile table-responsive">
        <div class="tile">

            <div class="table-responsive">
              <div class="card-body">
                <h2>Paramètres du système</h2>
                <hr width="30%" align="left">
                <div class="bs-component">
                  <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#ets">Etablissement</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#app">Application</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#msg">Messagerie</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#img">Images</a></li>
                    
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show mt-4" id="ets">
    
                      <form method="post" class="needs-validation" novalidate autocomplete="off" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                          <div class="col-md-6">
                            <div class="position-relative form-group"><label for="school_name" class="">Nom de l'établissement</label><input name="school_name" id="school_name" placeholder="Nom de l'étanlissement" type="text" class="form-control" value="{{ old('school_name', get_setting('school_name')) }}" required=""></div>
                          </div>
                          <div class="col-md-6">
                            <div class="position-relative form-group"><label for="address" class="">Adresse de l'établissement</label>
                              <input name="address" id="address" placeholder="Adresse de l'établissement" type="text" class="form-control" value="{{ old('address', get_setting('address')) }}" required="" maxlength="200"></div>
                            </div>
                            {{-- <div class="col-md-3">
                              <label for="academic_year" class="">Année académique</label>
                                <select class="form-control select2" name="academic_year" required>
                                  {{ create_option("academic_years","id","session",get_setting('academic_year')) }}
                                </select>
                            </div> --}}
                          </div>
    
                          <div class="form-row">
                            <div class="col-md-4">
                              <div class="position-relative form-group"><label for="phone1" class="">N° de téléphone (1)</label><input name="phone1" id="phone1" type="tel" class="form-control" required="" value="{{ old('phone1', get_setting('phone1')) }}" placeholder="N° de téléphone"></div>
                            </div>
                            <div class="col-md-4">
                              <div class="position-relative form-group"><label for="phone2" class="">N° de téléphone (2)</label><input name="phone2" id="phone2" type="tel" class="form-control" required="" value="{{ old('phone2', get_setting('phone2')) }}" placeholder="N° de téléphone"></div>
                            </div>
                            <div class="col-md-4">
                              <div class="position-relative form-group"><label for="email" class="">Email</label><input name="email" id="email" type="email" class="form-control" required="" value="{{ old('email', get_setting('email')) }}" placeholder="Adresse Email"></div>
                            </div>
                            {{--<div class="col-md-2">
                              <div class="position-relative form-group"><label for="currency" class="">Devise</label><input name="currency" id="currency" type="text" class="form-control" required="" value="{{ old('currency', get_setting('currency')) }}" placeholder="Devise"></div>
                            </div>--}}
                          </div>
    
                          <div class="form-row">
                            <div class="col-md-6">
                              <div class="position-relative form-group"><label for="timezone" class="">Fuseau horaire</label>
                                <select class="form-control select2" id="timezone" name="timezone" required>
                                  <option value="">Sélectionner un fuseau</option>
                                  {{ create_timezone_option(get_setting('timezone')) }}
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="position-relative form-group"><label for="language" class="">Langue</label>
                                <select class="form-control select2" id="language" name="language" required>
                                  <option value="fr">Français</option>
                                  <option value="en">Anglais</option>
                                  <option value="es">Espagnol</option>
                                  <option value="ar">Arabe</option>
                                </select>                                                    
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="position-relative form-group">
                                <label for="currency" class="">Devise</label>
                                <input name="currency" id="currency" type="text" class="form-control" required="" 
                                value="{{ old('currency', get_setting('currency')) }}" placeholder="Devise">
    
                                
                              </div>
                            </div>
    
                          </div>
    
    
    
                          <hr>
                          <p class="text-center">
                            <input type="submit" name="" value="Mettre à jour" class="mt-2 btn btn-primary">
                          </p>
    
                        </form>
                      </div>
                      <div class="tab-pane fade mt-4" id="app">
                        <form method="post" class="needs-validation" novalidate autocomplete="off" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="form-row">
    
    
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('Nom de l\'application') }}</label>                      
                                <input type="text" class="form-control" name="app_name" value="{{ get_setting('app_name') }}" required>
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('Titre de l\'application') }}</label>                       
                                <input type="text" class="form-control" name="from_name" value="{{ get_setting('from_name') }}" required>
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('Site Web') }}</label>                       
                                <input type="url" class="form-control" required="" name="website" value="{{ get_setting('website') }}">
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('Slogan de l\'application') }}</label>                       
                                <input type="text" class="form-control" required="" name="app_slogan" value="{{ get_setting('app_slogan') }}">
                              </div>
                            </div>
    
    
    
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('Couleur du menu primaire (Gauche)') }}</label>                       
                                <input type="text" class="jscolor form-control" required="" autocomplete="off" name="sidebarbgcolor" value="{{ get_setting('sidebarbgcolor') }}">
                              </div>
                            </div>
    
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('Couleur de l\'entête') }}</label>                       
                                <input type="text" class="form-control jscolor" autocomplete="off" name="headerbgcolor" value="{{ get_setting('headerbgcolor') }}" required="">
                              </div>
                            </div>
                          </div> 
                          <hr>
    
    
                          <p class="text-center">
                            <input type="submit" class="btn btn-primary " value="{{ ('Mettre à jour') }}">
                          </p>
    
    
                        </form>
                      </div>
                      <div class="tab-pane fade mt-4" id="msg">
                        <form method="post" class="needs-validation" novalidate autocomplete="off" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="form-row">
    
    
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('Email d\'envoi') }}</label>                      
                                <input type="text" class="form-control" name="from_email" value="{{ get_setting('from_email') }}" required>
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('Nom d\'envoi') }}</label>                       
                                <input type="text" class="form-control" name="from_name" value="{{ get_setting('from_name') }}" required>
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">{{ ('SMTP Host') }}</label>                       
                                <input type="text" class="form-control" required="" name="smtp_host" value="{{ get_setting('smtp_host') }}">
                              </div>
                            </div>
                            
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">{{ ('SMTP Port') }}</label>                       
                                <input type="text" class="form-control" required="" name="smtp_port" value="{{ get_setting('smtp_port') }}">
                              </div>
                            </div>
    
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">{{ ('SMTP Encryption') }}</label>                     
                                <select class="form-control" name="smtp_encryption" required="">
                                 <option value="ssl" {{ get_setting('smtp_encryption')=="ssl" ? "selected" : "" }}>{{ ('SSL') }}</option>
                                 <option value="tls" {{ get_setting('smtp_encryption')=="tls" ? "selected" : "" }}>{{ ('TLS') }}</option>
                               </select>
                             </div>
                           </div>
                           
                           <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">{{ ('Nom d\'utilisateur SMTP') }}</label>                       
                              <input type="text" class="form-control" required="" autocomplete="off" name="smtp_username" value="{{ get_setting('smtp_username') }}">
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">{{ ('Mot de passe SMTP') }}</label>                       
                              <input type="password" class="form-control smtp" autocomplete="off" name="smtp_password" value="{{ get_setting('smtp_password') }}" required="">
                            </div>
                          </div>
                        </div> 
                        <hr>
                        
                        
                        <p class="text-center">
                          <input type="submit" class="btn btn-primary " value="{{ ('Mettre à jour') }}">
                        </p>
                        
                        
                      </form>
    
                    </div>
                    <div class="tab-pane fade mt-4" id="img">
    
                      <form method="post" class="needs-validation" novalidate action="{{ route('settings.update_logo') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
    
                          <div class="col-md-3">
                            <label for="logo" class="btn text-center" style="color: black; float: center; width: 100%;">
                              <img id="logosite" src="@if (file_exists(get_setting('logo'))) {{asset(get_setting('logo'))}} @else {{  asset('images/settings/logo.png')}} @endif" height="210px" width="100%">{{ __('Logo') }}
                            </label>
                            <input type="file" id="logo" name="logo" style="visibility: hidden;" onchange="load_image(this, 'logosite');" accept=".jpg,.jpeg,.png">
    
    
                          </div>
                          <div class="col-md-3">
                            <label for="favicon" class="btn text-center" style="color: black; float: center; width: 100%;">
                              <img id="faviconsite" src="@if (file_exists(get_setting('favicon'))) {{asset(get_setting('favicon'))}} @else {{  asset('images/settings/favicon.png')}} @endif" height="210px" width="100%">{{ __('Favicon') }}
                            </label>
                            <input type="file" id="favicon" name="favicon" style="visibility: hidden;" onchange="load_image(this, 'faviconsite');" accept=".jpg,.jpeg,.png">
    
                          </div>
    
                          <div class="col-md-3">
                            <label for="default_avatar" class="btn text-center" style="color: black; float: center; width: 100%;">
                              <img id="avatar" src="@if (file_exists(get_setting('default_avatar'))) {{asset(get_setting('default_avatar'))}} @else {{  asset('images/settings/avatar.png')}} @endif" height="210px" width="100%">{{ __('Avatar par défaut') }}
                            </label>
                            <input type="file" id="default_avatar" name="default_avatar" style="visibility: hidden;" onchange="load_image(this, 'avatar');" accept=".jpg,.jpeg,.png">
                          </div>
    
    
                          <div class="col-md-3">
                            <label for="default_bg" class="btn text-center" style="color: black; float: center; width: 100%;">
                              <img id="bg" src="@if (file_exists(get_setting('default_bg'))) {{asset(get_setting('default_bg'))}} @else {{  asset('images/settings/bg.png')}} @endif" height="210px" width="100%">{{ __('Avatar par défaut') }}
                            </label>
                            <input type="file" id="default_bg" name="default_bg" style="visibility: hidden;" onchange="load_image(this, 'bg');" accept=".jpg,.jpeg,.png">
                          </div>
    
                        </div>
    
    
                        <hr>
                        <p class="text-center">
                          <input type="submit" class="btn btn-primary " value="{{ __('Mettre à jour') }}">
                        </p> 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
          </div>
    </section>

</main>
@endsection


@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection