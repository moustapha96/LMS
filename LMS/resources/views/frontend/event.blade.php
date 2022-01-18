@extends('backend.layouts.main')


@section('main')

<div class="container">
        <!-- Heading Page -->
        <section class="heading-page">
            <img src="images/bloggrid-heading-bg.jpg" alt="">
            <div class="container">
                <div class="heading-page-content">
                    <div class="au-page-title">
                        <h1>Events</h1>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('accueille') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

        <section class="events-page section-padding-large">
            <div class="container">
                <div class="events-page-content">
                    <div class="event-search">
                        <form class="search-event" method="GET">
                            <input type="text" name="eventdate" class="event-input" id="eventdate" placeholder="Date of Events">
                            <input type="text" name="eventname" class="event-input" placeholder="Keyword">
                            <input type="submit" name="submit" class="submit" value="Search"> 
                        </form>
                    </div>
                    <div id='calendar'></div>
                </div>
            </div>
        </section>
</div>

@endsection