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
                    primaire
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
                        <img src="images/primaireI.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-5">
        <h2 class="main-heading">Choisissez les matières que vous souhaitez étudier</h2>
        <div class="layout_padding2 row g-4">
            <div class="col-md-4 col-sm-6">
                <form action="{{route('preparePagePrimareCoures')}}"  method="POST">
                    @csrf
                    <div class="card shadow-sm">
                        <img src="images/francais.png" class="card-img-top" alt="francais">
                        <input type="hidden" name="image"   value="images/francaisCourses.png" />
                        <input type="hidden" name="matiere" value="francais" />
                        <input type="hidden" name="niveau"  value="pr" />
                        <div class="card-body">
                            <button type="submit" role="button" class="btn btn-primary w-100 fw-bold" style="background-color: #fec913;border: none">Sélectionner</button>
                        </div>
                    </div>
               </form>
            </div>
            <div class="col-md-4 col-sm-6">
                <form action="{{route('preparePagePrimareCoures')}}"  method="POST">
                    @csrf
                    <div class="card shadow-sm">
                        <img src="images/maths.png" class="card-img-top" alt="maths">
                        <input type="hidden" name="image" value="images/mathsCourses.png" />
                        <input type="hidden" name="matiere" value="maths" />
                        <input type="hidden" name="niveau" value="pr" />
                        <div class="card-body">
                            <button type="submit" role="button" class="btn btn-primary w-100 fw-bold" style="background-color: #fec913;border: none">Sélectionner</button>
                        </div>
                    </div>
               </form>
            </div>
            <div class="col-md-4 col-sm-6">
                <form action="{{route('preparePagePrimareCoures')}}"  method="POST">
                    @csrf
                    <div class="card shadow-sm">
                        <img src="images/englash.png" class="card-img-top" alt="englais">
                        <input type="hidden" name="image" value="images/englashCourses.png" />
                        <input type="hidden" name="matiere" value="englais" />
                        <input type="hidden" name="niveau" value="pr" />
                        <div class="card-body">
                            <button type="submit" role="button" class="btn btn-primary w-100 fw-bold" style="background-color: #fec913;border: none">Sélectionner</button>
                        </div>
                    </div>
               </form>
            </div>
            <div class="col-md-4 col-sm-6">
               <form action="{{route('preparePagePrimareCoures')}}"  method="POST">
                    @csrf
                    <div class="card shadow-sm">
                        <img src="images/arabe.png" class="card-img-top" alt="Arabe">
                        <input type="hidden" name="image" value="images/arabeCourses.png" />
                        <input type="hidden" name="matiere" value="arabe" />
                        <input type="hidden" name="niveau" value="pr" />
                        <div class="card-body">
                            <button type="submit" role="button" class="btn btn-primary w-100 fw-bold" style="background-color: #fec913;border: none">Sélectionner</button>
                        </div>
                    </div>
               </form>
            </div>
            <div class="col-md-4 col-sm-6">
                <form action="{{route('preparePagePrimareCoures')}}"  method="POST">
                    @csrf
                    <div class="card shadow-sm">
                        <img src="images/islamique.png" class="card-img-top" alt="Islamique">
                        <input type="hidden" name="image" value="images/islamiqueCourses.png" />
                        <input type="hidden" name="matiere" value="islamique" />
                        <input type="hidden" name="niveau" value="pr" />
                        <div class="card-body">
                            <button type="submit" role="button" class="btn btn-primary w-100 fw-bold" style="background-color: #fec913;border: none">Sélectionner</button>
                        </div>
                    </div>
               </form>
            </div>
            <div class="col-md-4 col-sm-6">
                <form action="{{route('preparePagePrimareCoures')}}"  method="POST">
                    @csrf
                    <div class="card shadow-sm">
                        <img src="images/social.png" class="card-img-top" alt="Islamique">
                        <input type="hidden" name="image" value="images/socialCourses.png" />
                        <input type="hidden" name="matiere" value="sociales" />
                        <input type="hidden" name="niveau" value="pr" />
                        <div class="card-body">
                            <button type="submit" role="button" class="btn btn-primary w-100 fw-bold" style="background-color: #fec913;border: none">Sélectionner</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
    
    @include('footer')

@endsection