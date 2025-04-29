@extends('layout')
@section('title')
Binajah | Courses{{$niveau}}
@endsection
@section('content')
    <div class="top_container">
      <!-- header section strats -->
      @include('header')
      <section class="hero_section ">
          <div class="hero-container container">
              <div class="hero_detail-box">
                <h1>
                    {{$course->title}}
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
                      <img src="{{ asset('storage/videos/courses/' . $course->folder . '/' . $course->img_course) }}" alt="course img" class="img-fluid">
                  </div>
              </div>
          </div>
      </section>
    </div>
    
    @if ($niveau == '1'){
        <div class="container mt-5 mb-5">
            <div class="row shadow p-3 bg-light rounded">
                <!-- Left Column (Videos) -->
                <div class="col-md-6 left-column scrollable">
                    <h3 class="fw-bold mb-5">Vidéos de cours</h3>
                    @foreach ($courseVideos as $video)
                        <div class="mt-3">
                            <h5>{{ $video->title }}</h5>
                            <video id="courseVideo" width="100%" style="border-radius:20px;height:300px;" controls preload="auto">
                                <source src="{{ asset('storage/videos/courses/' . $course->folder . '/' . $video->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
                <!-- Right Column (PDFs and Exercises) -->
                <div class="col-md-6 right-column scrollable " >
                    <h3 class="fw-bold p-2">description du cours</h3>
                    <div class="p-2">{!!$course->discription!!}</div>
                </div>
            </div>
        </div>
    }@elseif($niveau == '2'){
        <div class="alert alert-danger container mt-5" role="alert" id="paymentAlert">
            Ce cours est payant. Pour vous inscrire, veuillez contacter le responsable via WhatsApp ci-dessous.
        </div>
        <div class="container mt-5 mb-5">
            <div class="row shadow p-3 bg-light rounded">
                <!-- Left Column (Videos) -->
                <div class="col-md-6 left-column scrollable">
                    <h3 class="fw-bold mb-5">Vidéos de cours</h3>
                    @foreach ($courseVideos as $video)
                        <div class="mt-3">
                            <h5>{{ $video->title }}</h5>
                            <video 
                                id="courseVideo_{{ $video->id }}" 
                                width="100%" 
                                style="border-radius:20px;height:300px; pointer-events: none;" 
                                preload="auto" 
                                muted
                            >
                                <source src="{{ asset('storage/videos/courses/' . $course->folder . '/' . $video->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
                
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const videos = document.querySelectorAll("video[id^='courseVideo_']");
                        videos.forEach(video => {
                            video.addEventListener("click", function (e) {
                                e.preventDefault();
                                alert("Veuillez s’il vous plaît vous inscrire pour lire cette vidéo.");
                            });
                        });
                    });
                </script>
                
                <!-- Right Column (PDFs and Exercises) -->
                <div class="col-md-6 right-column scrollable " >
                    <h3 class="fw-bold p-2">description du cours</h3>
                    <div class="p-2">{!!$course->discription!!}</div>
                </div>
            </div>
        </div>
    }@elseif($niveau == '3'){
        <div class="container mt-5 mb-5">
            <div class="row shadow p-3 bg-light rounded">
                <!-- Left Column (Videos) -->
                <div class="col-md-6 left-column scrollable">
                    <h3 class="fw-bold mb-5">Vidéos de cours</h3>
                    @foreach ($courseVideos as $video)
                        <div class="mt-3">
                            <h5>{{ $video->title }}</h5>
                            <video id="courseVideo" width="100%" style="border-radius:20px;height:300px;" controls preload="auto">
                                <source src="{{ asset('storage/videos/courses/' . $course->folder . '/' . $video->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
                <!-- Right Column (PDFs and Exercises) -->
                <div class="col-md-6 right-column scrollable " >
                    <h3 class="fw-bold p-2">description du cours</h3>
                    <div class="p-2">{!!$course->discription!!}</div>
                </div>
            </div>
        </div>
    }@else{
        <div class="alert alert-danger container mt-5" role="alert" id="paymentAlert">
            Ce cours est payant. Pour vous inscrire, veuillez contacter le responsable via WhatsApp ci-dessous.
        </div>
        <div class="container mt-5 mb-5">
            <div class="row shadow p-3 bg-light rounded">
                <!-- Left Column (Videos) -->
                <div class="col-md-6 left-column scrollable">
                    <h3 class="fw-bold mb-5">Vidéos de cours</h3>
                    @foreach ($courseVideos as $video)
                        <div class="mt-3">
                            <h5>{{ $video->title }}</h5>
                            <video 
                                id="courseVideo_{{ $video->id }}" 
                                width="100%" 
                                style="border-radius:20px;height:300px; pointer-events: none;" 
                                preload="auto" 
                                muted
                            >
                                <source src="{{ asset('storage/videos/courses/' . $course->folder . '/' . $video->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
                
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const videos = document.querySelectorAll("video[id^='courseVideo_']");
                        videos.forEach(video => {
                            video.addEventListener("click", function (e) {
                                e.preventDefault();
                                alert("Veuillez s’il vous plaît vous inscrire pour lire cette vidéo.");
                            });
                        });
                    });
                </script>
                
                <!-- Right Column (PDFs and Exercises) -->
                <div class="col-md-6 right-column scrollable " >
                    <h3 class="fw-bold p-2">description du cours</h3>
                    <div class="p-2">{!!$course->discription!!}</div>
                </div>
            </div>
        </div>
    } 
    @endif

    @include('footer')
@endsection