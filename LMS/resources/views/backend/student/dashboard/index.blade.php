
@extends('backend.admin.includes.main')


@section ('styles')

@endsection


@section('main')

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard </h1>
          <p> Space  <strong class="text-uppercase"> étudiant</strong> </p>
        </div>
       
    
      </div>
    <div class="row">
      <div class="col-md-12">
        
          <section class="courses section-padding-large bg-parten section-bg-overlay">
              <div class="container">
                  <div class="section-title-white section-title-center">
                      <h2></h2>
                  </div>
                  <div class="courses-content featured-course-slider">
                      <div class="row">
                          @foreach($courses as $course)
                              
                            <div class="col-lg-4">
                                <article class="item wow fadeIn" data-wow-delay="0.1s">
                                    <div class="item-thumb">
                                        <div class="feadtured-course-small">
                                            <a href="#">
                                                <img src="{{ asset($course->image) }}" width="300" height="250" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <a href="{{ route('student.teacher.show',$course->teacher) }}" class="teacher">{{ $course->teacher->user->prenom .' '.$course->teacher->user->nom }}</a>
                                        <h3 class="title">
                                            <a href="{{ route('student.course.show',$course) }}"> {{ $course->name }}</a>
                                        </h3>
                                        <div class="desc display-flex">
                                            <div class="comments-students">
                                                <strong><i class="fa fa-user"></i> {{ $course->student_course->count() }} Student(s)</strong>
                                                <strong><i class="fa fa-book"></i> {{ $course->lessons->count() }} Lesson(s) </strong>
                                            </div>
                                            @if( Auth::user()->student->deja_Inscrit($course) == true ) 
                                            <strong> déja inscrit </strong>
                                         
                                            @else
                                            <a class="btn btn-outline-primary" href="{{ route('student.course.inscription',$course) }}" role="button">
                                                s'incrire</a> 
                                            
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                            
                          @endforeach
                         
                      </div>
                  </div>
              </div>
          </section>
          
      </div>
    </div>
  </main>
@endsection
