@extends('layout')
@section('title')
Binajah | Courses
@endsection
@section('content')
    <div class="top_container">
        <!-- header section strats -->
        @include('header')
        <section class="hero_section ">
            <div class="hero-container container">
                <div class="hero_detail-box">
                <h3>
                    Bienvenue dans<br>
                    la meilleure éducation
                </h3>
                <h1>
                    {{$matier}}
                </h1>
                <p>
                    Offrez à votre enfant un apprentissage de qualité 
                </p>
                <p style="margin-top:-20px">
                    pour bâtir son avenir.
                </p>
                </div>
                <div class="hero_img-container">
                    <div>
                        <img src="{{asset($image)}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-5">
        <div class="layout_padding2 row g-4">
           @foreach ($courses as $course)
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm position-relative">
                    <span class="badge position-absolute top-0 end-0 m-2 px-3 py-2 rounded-pill" style="background-color: {{ $course->statut === 'pu' ? '#28a745' : '#dc3545' }}; color: white;">
                        {{ $course->statut === 'pu' ? 'Gratuit' : 'Payant' }}
                    </span>
                
                    <img src="{{ asset('storage/videos/courses/' . $course->folder . '/' . $course->img_course) }}" 
                         class="card-img-top" 
                         alt="{{ $course->title }}" />
                
                    <div class="card-header">
                        <h5>{{ $course->title }}</h5>
                    </div>
                
                    <div class="card-body">
                        <a href="/college/Courses/{{ $course->id }}/{{ $course->matier }}" 
                           class="btn btn-primary w-100 fw-bold" 
                           style="background-color: #fec913; border: none;">
                            Sélectionner
                        </a>
                    </div>
                </div>                
            </div>
           @endforeach
        </div>
    </div>
    
    @include('footer')
@endsection