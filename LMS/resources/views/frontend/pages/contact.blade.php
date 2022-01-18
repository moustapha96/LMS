@extends('backend.layouts.main')


@section('main')

<div class="container">
        <!-- Heading Page -->
        <section class="heading-page">
            <img src="images/bloggrid-heading-bg.jpg" alt="">
            <div class="container">
                <div class="heading-page-content">
                    <div class="au-page-title">
                        <h1>Contactez-Nous</h1>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('accueille')}}">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Contact us -->
        <section class="contact-us section-padding-large">
            <div class="container">
                <div class="contact-us-content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="contact-us-info">
                                <h3 class="contact-title">
                                    Contact Info
                                </h3>
                                <div class="item">
                                    <i class="fas fa-home"></i>
                                    <span class="address-info">
                                        @php isset($address) ? $address = $address." | " . get_setting('address') 
                                        : $address = get_setting('address')  ; @endphp
                                        {{ $address }}
                                    </span>
                                </div>
                                <div class="item phone-item">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span class="contact-phone">
                                        @php isset($phone) ? $phone = $phone." | " . get_setting('phone') 
                                        : $phone = get_setting('phone')  ; @endphp
                                        {{ $phone }}
                                    </span>
                                </div>
                                <div class="item">
                                    <i class="far fa-clock"></i>
                                    <div class="time-info">
                                        <span>Weekdays: 9:00am - 6:00pm</span>
                                        <span>Sat - Sun: 9:00am - 5:00pm</span>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="contact-form">
                                <h3 class="contact-title">
                                   Contacter-Nous
                                </h3>
                                <form method="POST" action="{{ route('contact.envoie') }}" >
                                    @csrf
                                    <div class="form-input">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="wrap-group">
                                                    <input type="text" name="name" placeholder="Nom complet*" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="wrap-group">
                                                    <input type="email" name="email" placeholder="Votre Adresse Email*" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="wrap-group">
                                                    <input type="text" name="sujet" placeholder="sujet*" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-group">
                                        <textarea name="message" placeholder="Commentaire*" required></textarea>
                                    </div>
                                    <div class="wrap-group">
                                        <input type="submit" class="btn-submit au-btn-hover" name="submit" value="Envoyer">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Conatct Map -->
        <section class="contact-map-1">
            <div class="map-wrapper js-google-map" data-makericon="images/icon/icon-map-blue.png" data-makers='[["Smartedu", "Now that you visited our website,<br> how about checking out our office too?", 40.717209, -74.005165]]'>
                <div class="map__holder js-map-holder" id="map"></div>
            </div>
        </section>
</div>

@endsection