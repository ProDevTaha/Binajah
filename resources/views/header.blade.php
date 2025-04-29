<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/logoo.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="/"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#courses"> Courses <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#about"> About </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                @if (isset(Auth::user()->name))
                    <li class="nav-item d-flex align-items-center justify-content-center">
                        <a class="nav-link" >{{Auth::user()->name}}</a>
                        <span>
                            <form  class="dropdown-item text-danger" id="logout-form" action="{{route('auth.logout')}}"  method="POST" class="d-none" style="padding: 0px;">
                                @csrf
                                <button style="border: none;background: none;color: rgb(0, 17, 255);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-box-arrow-right mb-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                                    </svg>
                                </button>
                            </form>
                        </span>
                    </li>                       
                @endif
            </ul>
            @if (!isset(Auth::user()->name))
                <a class="btn text-light" style="background-color: rgb(9, 46, 131);p-2" href="/login">Login</a>
            @endif    
        </div>
        </nav>
    </div>
</header>