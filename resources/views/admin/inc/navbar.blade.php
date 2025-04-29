<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Right navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" click data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>					
  </ul>
  <div class="navbar-nav pl-2">
    <!-- <ol class="breadcrumb p-0 m-0 bg-white">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol> -->
  </div>
  
  <ul class="navbar-nav ml-auto">
    <li class="nav-item" >
      <a class="nav-link rounded-pill" href="/" style="background-color: rgb(224, 240, 255)" target="_blank" role="button" >
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16" style="color: blue">
          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
        </svg>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  
    <li class="nav-item dropdown">
      <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
        @if (!isset(Auth()->user()->image))
        <img src="{{ asset('admin/img/userDefault.png')}}" class='img-circle elevation-2' width="40" height="40" alt="user image"> 
        @else
        <img src="{{ asset('storage/images/users/' . (Auth()->user() ? Auth()->user()->image : '')) }}" class='img-circle elevation-2' width="40" height="40" alt="user image">
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
        <h4 class="h4 mb-0"><strong>{{ Auth()->user() ? Auth()->user()->name : '' }}</strong></h4>
        <div class="mb-3">{{ Auth()->user() ? Auth()->user()->email : '' }}</div>
        <div class="dropdown-divider"></div>
        <a href="/admin/Users" class="dropdown-item">
          <i class="fas fa-user-cog mr-2"></i> Settings								
        </a>
        <div class="dropdown-divider"></div>
        <a href="/password/reset" class="dropdown-item">
          <i class="fas fa-lock mr-2"></i> Change Password
        </a>
        <div class="dropdown-divider"></div>
        <form  class="dropdown-item text-danger" id="logout-form" action="{{route('auth.logout')}}"  method="POST" class="d-none">
          @csrf
          <button class="btn btn-sm btn-danger fw-bold w-100" style="border:none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi fw-bold bi-box-arrow-in-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
              <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg>
            Logout
          </button>
        </form>			
      </div>
    </li>
  </ul>
</nav>
