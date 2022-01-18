@extends('backend.layouts.main')


@section('main')

<div class="container">
        <!-- Heading Page -->
        <section class="heading-page">
            <img src="images/bloggrid-heading-bg.jpg" alt="">
            <div class="container">
                <div class="heading-page-content">
                    <div class="au-page-title">
                        <h1>Page Not Found</h1>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('accueille') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">404</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

        <!-- 404 Page -->
        <section class="error-page section-padding-large">
            <div class="container">
                <div class="error-page-content">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="error-image">
                                <img src="images/icon/404.png" alt="404">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="error-content">
                                <h3 class="title">
                                    404
                                </h3>
                                <p class="desc">
                                    We can’t seem to find the page you’re looking for.
                                </p>
                                <a href="{{ route('accueille') }}" class="au-btn-hover error-btn">Back To Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

@endsection