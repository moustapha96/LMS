@extends('backend.layouts.main')


@section('main')

<div class="container">
        <!-- Heading Page -->
        <section class="heading-page">
            <img src="images/bloggrid-heading-bg.jpg" alt="">
            <div class="container">
                <div class="heading-page-content">
                    <div class="au-page-title">
                        <h1>Nos Cours</h1>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('accueille')}}">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cours</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

           <!-- Course -->
           <section class="courses section-padding-large bg-parten section-bg-overlay">
            <div class="container">
                <div class="section-title-white section-title-center">
                    <h2>Nos Cours les plus populaires</h2>
                    <p class="title-desc">
                        Tempus egestas sed sed risus pretium quam vulputate. Sit amet est placerat in id nibh tortor egestas erat imperdiet sed.
                    </p>
                </div>
                <div class="courses-content featured-course-slider">
                    <div class="our-team-content">
                        <div class="row">
                            @foreach($courses as $course)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <article class="item wow fadeIn" data-wow-delay="0.1s">
                                        <div class="item-thumb">
                                            <a href="">
                                                <img src="/uploads/avatars/{{ $course->image }}" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                            <div class="feadtured-course-small">
                                                <a href="">
                                                    <img src="/uploads/avatars/{{ $course->image }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <a href=""
                                                 class="sub-title btn au-btn-hover ">Formateur  <strong > {{ $course->teacher->user->prenom }} {{ $course->teacher->user->nom }} </strong></a>
                                            <h3 class="title">
                                                <a href="">{{ $course->name }}</a>
                                            </h3>
                                            <p class="course-desc">
                                            {{ $course->description  }}
                                            </p>
                                            <div class="desc display-flex">
                                                <div class="comments-students">
                                                    <a href="" class="comments"><i class="fas fa-user"></i>{{ $course->student_course->count() }} Student(s)</a>
                                                <a href="" class="students">
                                                    <i class="fas fa-book"></i>{{ $course->lessons->count() }} Lesson(s)</a>
                                                 <a href="" class="students">
                                                    <i class="fas fa-question"></i>{{ $course->quiz->count() }} Quiz</a>
                                                    
                                                
                                                </div>
                                            </div>
                                            <div class="justify-content-start">
                                                <div class="justify-content-start">
                                                @if($course->price == 0 )
                                                    <span class="price free">Gratuit</span>
                                                @else
                                                    <span class="price notfree">{{ $course->price }} Franc CFA</span>
                                                @endif
                                                </div>
                                            
                                            </div>
                                            <div class="desc display-flex justify-content-center">
                                                <div class="justify-content-center">
                                                    <a href=""
                                                    class="btn au-btn-hover btn-success">suivre ce cours</a>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


       
</div>

@endsection