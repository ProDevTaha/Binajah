@extends('admin/layoutAdmin')

@section('content')
<section class="content mt-5">
    @if ($errors->any())
        <div class="alert alert-danger w-50 m-auto">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('auth.login') }}" method="POST" >
        @csrf
        <div class="container-fluid shadow p-3 w-50 m-auto" style="background-color: aliceblue">
            <div class="text-center">
                <img src="{{asset('images/logoo.png')}}" alt="logo" class="img-fluid rounded" style="height:70px;width:200px">
            </div>

            <!-- Display Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{ old('email') }}" />
            </div>
            
            <div class="mt-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="password" />
            </div>
            
            <div class="mt-3 text-center">
                <button type="submit" style="background-color: rgb(9, 46, 131)" class="btn text-light p-2 fw-bold w-50">Login</button>
            </div>
        </div>
    </form>
</section>
@endsection
