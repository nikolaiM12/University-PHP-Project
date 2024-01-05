@extends('layouts.admin')
@section('content')
<section id="news" class="py-5">
    <div class="container">
        <h2 class="display-4 mb-4 text-center">News and Updates</h2>
        <div class="row">
            <div class="col-md-6">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif
                <div class="card mb-4">
                    <img src="{{ asset('img/news.jpg') }}" class="card-img-top" alt="Новина 1" />
                    <div class="card-body">
                        <h5 class="card-title">News 1</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec felis ut turpis
                            condimentum fringilla in eget ex. Ut at neque nec dolor hendrerit vestibulum a nec
                            purus.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ asset('img/news1.jpg') }}" class="card-img-top" alt="Новина 2" />
                    <div class="card-body">
                        <h5 class="card-title">News 2</h5>
                        <p class="card-text">
                            Proin blandit enim in justo malesuada, sit amet blandit purus pulvinar. Sed gravida
                            ligula nec metus aliquam, nec fringilla lectus aliquet. Nunc volutpat, nisl vel posuere
                            iaculis, tellus metus laoreet quam.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="col-md-4 animate__animated animate__fadeIn">
    <h2 class="mb-3">Opening Hours</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Hours</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">Monday</td>
                    <td>10:00 AM - 9:00 PM</td>
                </tr>
                <tr>
                    <td scope="row">Tuesday</td>
                    <td>10:00 AM - 9:00 PM</td>
                </tr>
                <tr>
                    <td scope="row">Wednesday</td>
                    <td>10:00 AM - 9:00 PM</td>
                </tr>
                <tr>
                    <td scope="row">Thursday</td>
                    <td>10:00 AM - 9:00 PM</td>
                </tr>
                <tr>
                    <td scope="row">Friday</td>
                    <td>10:00 AM - 10:00 PM</td>
                </tr>
                <tr>
                    <td scope="row">Saturday</td>
                    <td>11:00 AM - 10:00 PM</td>
                </tr>
                <tr>
                    <td scope="row">Sunday</td>
                    <td>11:00 AM - 9:00 PM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<section id="events" class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Upcoming Events</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ asset('img/event1.jpg') }}" class="card-img-top" alt="Event 1" />
                    <div class="card-body">
                        <h5 class="card-title">Author Meetup</h5>
                        <p class="card-text">
                            Join us for an exciting author meetup where you can meet your favorite authors and discuss their latest works.
                        </p>
                        <p class="card-text">
                            <strong>Date:</strong>
                            June 15, 2023
                        </p>
                        <p class="card-text">
                            <strong>Time:</strong>
                            3:00 PM - 5:00 PM
                        </p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ asset('img/event2.jpg') }}" class="card-img-top" alt="Event 2" />
                    <div class="card-body">
                        <h5 class="card-title">Book Fair</h5>
                        <p class="card-text">
                            Don't miss our annual book fair, featuring a wide range of books for all ages. Explore the world of literature with us!
                        </p>
                        <p class="card-text">
                            <strong>Date:</strong>
                            July 20, 2023
                        </p>
                        <p class="card-text">
                            <strong>Time:</strong>
                            10:00 AM - 6:00 PM
                        </p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
