{{-- 
@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-money"></i>Payement</h1>
      <p>Achat du cours >> {{ $course->name }} </p>
    </div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{ url()->previous() }}" class="btn btn-outline-dark"> <i class="fa fa-reply" aria-hidden="true"></i>Retour </a> </li>
    </ul>
  </div>
  
 
  <div class="container card">
      <div class="card-header text-center h1 ">Payement </div>
    <div class='card-body'>
        <div class=''>
            <form accept-charset="UTF-8" action="{{ route('student.payement',$course) }}"  id="payment-form" method="post">
               @csrf
              
               <div class="row">

                   <div class="col-md-6">
                       <div class='row'>
                           <div class='col-md-6 form-group card'>
                               <label class='control-label'>Nom sur la carte</label>
                               <input class='form-control' size='4' type='text' name="name">
                           </div>
                           <div class='col-md-6 form-group card'>
                               <label class='control-label'>Numéro de carte</label>
                               <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_no">
                           </div>
                       </div>
       
                       <div class='row'>
                           <div class='col-md-4 form-group '>
                               <label class='control-label'>CVC</label>
                               <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvc">
                           </div>
                           <div class='col-md-4 form-group '>
                               <label class='control-label'>Expiration</label>
                               <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="expiration_month">
                           </div>
                           <div class='col-md-4 form-group '>
                               <label class='control-label'>Année </label>
                               <input class='form-control card-expiry-year' placeholder='AAAA' size='4' type='text' name="expiration_year">
                           </div>
                       </div>
       
                       <div class='row'>
                           <div class='col-md-12 form-group'>
                               <label class='control-label'>Total (FCFA)</label>
                               <input class='form-control' type='text' name="amount" value="{{ $course->price }}" >
                           </div>
                       </div>
       
                       <div class='row'>
                           <div class='col-md-12 form-group'>
                               <button class='form-control btn btn-primary submit-button' type='submit'>
                                        <i class="fa fa-money" aria-hidden="true"></i> Payer  </button>
                           </div>
                       </div>
                   </div>
    
                    <div class="col-md-6">
                        <div class="m-4">
                            <h4 class="text-center" >Libellé du Cours</h4>
                            <hr>
                            <ul>
                                <li class="h4" > <strong>Nom : {{ $course->name }}</strong> </li>
                                <li class="h4" > <strong>Prix : {{ $course->price }} Fcfa</strong> </li>
                                <li class="h4" > <strong>Description : {{ $course->description }}</strong> </li>
                                <li class="h4" >  <strong>Leçons disponible : {{ $course->lessons->count() }}  </strong> </li>
                            </ul>
                        </div>
                    </div>
               </div>

            </form>
        </div>
    </div>
  </div>

</main>
@endsection


@section('scripts1')

@endsection --}}

@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-money"></i>Payement</h1>
          <p>Achat du cours >> {{ $course->name }} </p>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ url()->previous() }}" class="btn btn-outline-dark"> <i class="fa fa-reply" aria-hidden="true"></i>Retour </a> </li>
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
                <h2>Payement Du Cours >> {{ $course->name }}</h2>
                <hr width="30%" align="left">
                <div class="bs-component">
                    <ul class="nav nav-tabs nav-fill">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cc">Card Crédit</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#paypal">PayPal</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#verification">Vérification</a></li>
                        
                    </ul>
                    <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show mt-4" id="cc">
                                
                                <form accept-charset="UTF-8" action="{{ route('student.payement_cc',$course) }}"  id="payment-form" method="post">
                                    @csrf
                                   
                                    <div class="row">
                     
                                        <div class="col-md-6">
                                            <div class='row'>
                                                <div class='col-md-6 form-group card'>
                                                    <label class='control-label'>Nom sur la carte</label>
                                                    <input class='form-control' size='4' type='text' name="name">
                                                </div>
                                                <div class='col-md-6 form-group card'>
                                                    <label class='control-label'>Numéro de carte</label>
                                                    <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_no">
                                                </div>
                                            </div>
                            
                                            <div class='row'>
                                                <div class='col-md-4 form-group '>
                                                    <label class='control-label'>CVC</label>
                                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvc">
                                                </div>
                                                <div class='col-md-4 form-group '>
                                                    <label class='control-label'>Expiration</label>
                                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="expiration_month">
                                                </div>
                                                <div class='col-md-4 form-group '>
                                                    <label class='control-label'>Année </label>
                                                    <input class='form-control card-expiry-year' placeholder='AAAA' size='4' type='text' name="expiration_year">
                                                </div>
                                            </div>
                            
                                            <div class='row'>
                                                <div class='col-md-12 form-group'>
                                                    <label class='control-label'>Total (FCFA)</label>
                                                    <input class='form-control' type='text' name="amount" value="{{ $course->price }}" >
                                                </div>
                                            </div>
                            
                                            <div class='row'>
                                                <div class='col-md-12 form-group'>
                                                    <button class='form-control btn btn-primary submit-button' type='submit'>
                                                             <i class="fa fa-money" aria-hidden="true"></i> Payer  </button>
                                                </div>
                                            </div>
                                        </div>
                         
                                         <div class="col-md-6">
                                             <div class="m-4">
                                                 <h4 class="text-center" >Libellé du Cours</h4>
                                                 <hr>
                                                 <ul>
                                                     <li class="h4" > <strong>Nom : {{ $course->name }}</strong> </li>
                                                     <li class="h4" > <strong>Prix : {{ $course->price }} Fcfa</strong> </li>
                                                     <li class="h4" > <strong>Description : {{ $course->description }}</strong> </li>
                                                     <li class="h4" >  <strong>Leçons disponible : {{ $course->lessons->count() }}  </strong> </li>
                                                 </ul>
                                             </div>
                                         </div>
                                    </div>
                     
                                 </form>
                            </div>
                            <div class="tab-pane fade mt-4" id="paypal">
                                paypal
                            </div>
                            <div class="tab-pane fade mt-4" id="verification">
                                Vérification
                            </div> 
                        
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