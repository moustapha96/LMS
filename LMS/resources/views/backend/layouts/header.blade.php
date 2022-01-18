 
 	@include('backend.layouts.styles')
 <!-- page load-->
    <div class="images-preloader">
	    <div id="preloader_1 spinner1" class="spinner1 rectangle-bounce">
	    	<div class="double-bounce1"></div>
	    	<div class="double-bounce2"></div>
	    </div>
	</div>

    <!-- Header page -->
    <header class="header">
        <div class="header-top hidden-tablet-landscape">
            <div class="container">
                <div class="header-top-content display-flex">
                    <div class="header-top-info">
                        <div class="header-socials">
                            <ul>
                                <li><a href="#"> <i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <a href="mailto:info@smartedu.com" class="email"><i class="far fa-envelope"></i>info@smartedu.com</a>
                        <a href="#" class="telephone"><i class="fas fa-mobile-alt"></i>
                            TEL:
                             @php isset($phone) ? $phone = $phone." | " . get_setting('phone') : $phone = get_setting('phone')  ; @endphp
                             {{ $phone }}
                        </a>
                       
                    </div>
                    <div class="header-top-account">
                        @if( Auth::check() )
                       
                        <li class="item-thumb d-inline-block">
                             <a class="signup" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                
                                <i  class="fas fa-edit"></i> {{ __('Logout') }}
                            </a>
                                                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </li>

                        @else
                            <a href="{{ route('register') }}" class="signup"><i class="fas fa-edit"></i>Sign Up</a>
                            <a href="{{ route('login') }}" class="login">Sign In</a>
                        @endif

                        
                        

                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom hidden-tablet-landscape" id="js-navbar-fixed">
            <div class="container">
                <div class="header-bottom">
                    <div class="header-bottom-content display-flex">
                        <div class="logo">
                            <a href="{{route('accueille')}}">
                                @php isset($logo) ? $logo = $logo." | " . get_setting('logo') : $logo = get_setting('logo')  ; @endphp
                                <img src="{{ asset($logo) }}" alt="SmartEdu" width="60" height="60">

                                {{-- <img src="{{ asset('images/logo.png') }}" alt="SmartEdu"> --}}
                            </a>
                        </div>
                        <div class="menu-search display-flex">
                            <nav class="menu">
                                <div>
                                    <ul class="menu-primary">
                                        <li class="menu-item"><a href="{{route('accueille')}}">Acceuil</a></li>
                                        <li class="menu-item"><a href="{{ route('apropos') }}">A propos</a></li>
                                        <li class="menu-item"><a href="{{ route('service') }}">Service</a></li>
                                        <li class="menu-item"><a href="{{ route('cours') }}">Cours</a></li>
                                        <li class="menu-item"><a href="{{ route('categories') }}">Catégories</a></li>
                                        <li class="menu-item"><a href="{{ route('quiz') }}">Quiz</a></li>
                                        <li class="menu-item"><a href="{{ route('contact') }}">Contact</a></li>
                                        
                                    </ul>
                                    
                                </div>
                            </nav>
                            <div class="search-box">
                                <form method="POST">
                                    <input type="text" placeholder="Search..." id="search-box" name="s" value="">
                                    <div class="search-icon display-flex-center">
                                        <i class="la la-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-tablet-landscape-up header-mobile">
            <div class="header-top-mobile">
                <div class="container-fluid">
                    <div class="logo">
                        <a href="{{route('accueille')}}">
                            <img src="{{ asset('images/logo.png') }}" alt="SmartEdu" />
                        </a>
                    </div>
                    <div class="search-box">
                        <form method="POST">
                            <input type="text" placeholder="Search..." name="s" value="">
                            <div class="search-icon font-color-white display-flex-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </form>
                    </div>
                    <button class="hamburger hamburger--spin hidden-tablet-landscape-up" id="toggle-icon">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="au-nav-mobile">
                <nav class="menu-mobile">
                    <div>
                        <ul class="au-navbar-menu">
                            <li class="menu-item"><a href="{{route('accueille')}}">Acceuil</a></li>
                            <li class="menu-item"><a href="{{ route('apropos') }}">A propos</a></li>
                            <li class="menu-item"><a href="{{ route('service') }}">Service</a></li>
                            <li class="menu-item"><a href="{{ route('cours') }}">Cours</a></li>
                            <li class="menu-item"><a href="{{ route('categories') }}">Catégories</a></li>
                            <li class="menu-item"><a href="{{ route('quiz') }}">Quiz</a></li>
                            <li class="menu-item"><a href="{{ route('contact') }}">Contact</a></li>
                         </ul>
                         
                    </div>
                </nav>
            </div>
            <!-- <div class="clear"></div> -->
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-top-content display-flex">
                        <div class="header-top-info">
                            <a href="tel:04445552222" class="telephone"><span><i class="fas fa-mobile-alt"></i></span> +1 444-555-2222</a>
                            <a href="mailto:info@smartedu.com" class="email"><span><i class="far fa-envelope"></i></span> info@smartedu.com</a>
                          
                        </div>
                        <div class="header-top-account">

                           
                            @if( Auth::check() )
                             <li class="item-thumb d-inline-block">
                             <a href="{{ route('profil') }}" class="dropdown-item  au-btn-hover">
                                                
                                                        <img 
                                                        src="/uploads/avatars/{{Auth::user()->avatar}}" 
                                                            alt="User Image" style="border-radius: 50% ; width: 50px;height: 50px;">
                                                    </a>
                                                    
                            </li>
                            
                             <li class="item-thumb d-inline-block">
                               <a class="signup" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    
                                                    <i  class="fas fa-edit"></i> {{ __('Logout') }}
                                                </a>
                                                    
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>

                        </li>
                            @else
                                <a href="{{ route('register') }}" class="signup"><i class="fas fa-edit"></i>Sign Up</a>
                                <a href="{{ route('login') }}" class="login"><i class="fas fa-user"></i>Sign In</a>
                            @endif
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </header>


	@include('backend.layouts.scripts')


