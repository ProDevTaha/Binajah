@extends('layout')
@section('title')
Binajah
@endsection

@section('content')
    
    <!-- header section -->
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
                ecole binajah
            </h1>
            <p>
                Offrez à votre enfant un apprentissage de qualité 
            </p>
            <p style="margin-top:-20px">
                pour bâtir son avenir.
            </p>
            <div class="hero_btn-continer">
                <a href="" class="call_to-btn btn_white-border">
                    <span class="fw-bold">
                        Découvrir les cours
                    </span>
                    <img src="images/right-arrow.png" alt="">
                </a>
            </div>
            </div>
            <div class="hero_img-container">
            <div>
                <img src="images/hero.png" alt="" class="img-fluid">
            </div>
            </div>
        </div>
        </section>
    </div>
    <!-- end header section -->

    <!-- services -->
    <div class="container-fluid d-flex justify-content-around align-items-center flex-wrap mt-5">
        <!-- Card 1 -->
        <div class="card mt-3" style="height: 350px; width: 400px; background-color: rgb(239, 239, 239);border:none;border-radius:20px">
            
            <div class="card-header" style="border: none;height:150px;padding:10px;background-color:  rgb(239, 239, 239);border-radius:20px">
                <img src="{{asset('images/morroco.png')}}" class="card-img-top" alt="Card 2 image" style="height:100%; object-fit: cover;border-radius:10px">
            </div>
            <div class="card-body">
                <h5 class="card-title text-start">Contenus conformes au référentiel du ministère</h5>
                <p class="card-text text-start">
                    Contenus encadrés et vérifiés par des enseignants agrégés, en parfait accord avec le programme officiel de l’Éducation nationale.
                </p>
            </div>
        </div>
        
        <!-- Card 2 -->
        <div class="card mt-3" style="height: 350px; width: 400px; background-color: rgb(239, 239, 239);border:none;border-radius:20px">
            
            <div class="card-header" style="border: none;height:150px;padding:10px;background-color:  rgb(239, 239, 239);border-radius:20px">
                <img src="{{asset('images/experience.png')}}" class="card-img-top" alt="Card 2 image" style="height:100%; object-fit: cover;border-radius:10px">
            </div>
            <div class="card-body">
                <h5 class="card-title text-start">Une expérience d’apprentissage complète</h5>
                <p class="card-text">
                    Vidéos, fiches de cours, exercices, quiz, annales… Le tout accessible 24/24, 7j/7, pour apprendre en toute liberté.
                </p>
            </div>
        </div>
        
        <!-- Card 3 -->
        <div class="card mt-3" style="height: 350px; width: 400px; background-color: rgb(239, 239, 239);border:none;border-radius:20px">
            <div class="card-header" style="border: none;height:150px;padding:10px;background-color:  rgb(239, 239, 239);border-radius:20px">
                <img src="{{asset('images/bola.png')}}" class="card-img-top" alt="Card 2 image" style="height:100%; object-fit: cover;border-radius:10px">
            </div>
            <div class="card-body">
                <h5 class="card-title text-start">Un accompagnement personnalisé par nos profs</h5>
                <p class="card-text">
                    Des questions ? Un exercice compliqué ? Les profs de Kezakoo sont là pour répondre à toutes tes questions.
                </p>
            </div>
        </div>
    </div>
    
    <!-- end services -->
    <div class="container mt-5">
        <img src="images/advertising.png" alt="" style="width: 100%;height:auto;;border-radius:10px">
    </div>
    <!-- about section -->
    <section class="about_section layout_padding" id="about">
        <div class="container d-flex flex-wrap align-items-center">
            <div style="width:700px">
                <h2 class="main-heading">
                    À propos de l'école
                </h2>
                <p class="text-start">
                    À l’ère du numérique et des avancées technologiques, l’éducation traverse une véritable mutation, impliquant élèves, parents, enseignants et établissements.
    
                    Les usages et comportements des jeunes évoluent rapidement, rendant le modèle éducatif traditionnel de plus en plus inadapté aux attentes et aux habitudes de la nouvelle génération.
                    
                    Face à ces défis, l’équipe d’EdDrass+ a pour mission d’élever les standards de l’éducation au Maroc en intégrant la technologie, tout en personnalisant l’expérience d’apprentissage pour correspondre aux modes de vie de la génération actuelle.
                </p>
            </div>
            <div style="width:430px">
                <img src="images/kids.png" alt="" class="img-fluid" style="height:auto;width:100%;border-radius:10px;">
            </div>
            
        </div>
    </section>
    <!-- about section -->
    
    <!-- show les courses -->
    <div class="container mt-5" id="courses">
        <h2 class="main-heading">Choisissez les matières que vous souhaitez étudier</h2>
        <div class="layout_padding2 row g-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-sm-6">
                <div class="card shadow-sm">
                    <img src="images/Primaire.png" class="card-img-top" alt="Matière 1">
                    <div class="card-body">
                        <a href="/primaire" class="btn w-100 fw-bold" style="background-color: rgb(254, 201, 19);color: rgb(255, 255, 255)">Sélectionner</a>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="col-md-6 col-sm-6">
                <div class="card shadow-sm">
                    <img src="images/college.png" class="card-img-top" alt="Matière 2">
                    <div class="card-body">
                        <a href="/college" class="btn w-100 fw-bold" style="background-color: rgb(254, 201, 19);color: rgb(255, 255, 255)">Sélectionner</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- fin  les courses -->

    <!-- vehicle section -->
    <section class="vehicle_section layout_padding">
        <div class="layout_padding-top">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item ">
                    <div class="vehicle_img-box ">
                        <img src="images/bus.png" alt="" class="img-fluid w-100" style="border-radius: 10px">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="vehicle_img-box ">
                        <img src="images/bus2.png" alt="" class="img-fluid w-100" style="border-radius: 10px">
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="vehicle_img-box ">
                        <img src="images/bus3.png" alt="" class="img-fluid w-100" style="border-radius: 10px">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>

    </section>
    <!-- vehicle section -->


    <style>
        @media (max-width: 1440px) {
            .containerr {
                width: 50%;
                margin: auto;
            }
        }
        @media (max-width: 720px) {
            .containerr {
                width: 100%;
            }
        }
    </style>
    <!-- client section -->
    <!-- Desktop image -->
    <div class="text-center mt-5 d-none d-md-block">
        <img src="images/team.png" alt="img team" style="width:70%;height:400px;border-radius:20px;margin:auto" />
    </div>

    <!-- Mobile image -->
    <div class="text-center mt-5 d-block d-md-none">
        <img src="images/teamInd.png" alt="img team" style="width:70%;height:400px;border-radius:20px;margin:auto" />
    </div>


    <section class="client_section layout_padding">
        <div class="containerr" >
            <h2 class="main-heading ">
                L'avis de nos étudiants
            </h2>
            <div class="layout_padding2">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="images/feedback1.png" class="d-block w-100" alt="..." style="height:200px;width:100% !important;border-radius:20px">
                      </div>
                      <div class="carousel-item">
                        <img src="images/feedback2.png" class="d-block w-100" alt="..." style="height:200px;width:100% !important;border-radius:20px">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
    </section>
    <!-- client section -->

    <!-- contact section -->
    <section class="contact_section layout_padding-bottom" id="contact">
        <div class="container">

        <h2 class="main-heading">
            Contactez-nous maintenant

        </h2>
        <div class="">
            <div class="contact_section-container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                <div class="contact-form">
                    <form action="">
                        <div>
                            <input type="text" placeholder="Nom">
                        </div>
                        <div>
                            <input type="text" placeholder="Numéro de téléphone">
                        </div>
                        <div>
                            <input type="email" placeholder="Email">
                        </div>
                        <div>
                            <input type="text" placeholder="Message" class="input_message">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn_on-hover">
                                Envoyer
                            </button>
                        </div>
                    </form>                    
                </div>
                </div>
            </div>
            </div>
        </div>

        </div>
    </section>
    <!-- end contact section -->

    <!-- footer section -->
    @include('footer') 

@endsection