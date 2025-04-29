@extends('admin/layoutAdmin')

@section('title')
Binajah | admin | update users 
@endsection 

@section('content')

	<div class="wrapper">	
		@include('admin/inc/navbar')
		@include('admin/inc/sidebar')
		<div class="content-wrapper p-4">
			<section class="content-header w-50 m-auto">					
				<div class="container-fluid my-2">
					<div class="row mb-2">
						<div class="col-sm-12 text-center">
							<h1>update user</h1>
						</div>
						{{-- <div class="col-sm-6 text-right">
							<a href="/admin/Courses/Create" class="btn btn-success fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">New Courses</a>
						</div> --}}
					</div>
				</div>
			</section>
			<section class="content">
			    <form action="{{route('user.update')}}" method="POST">
                    @csrf
                    <div class="container-fluid shadow p-3 w-50 m-auto">
						<input type="hidden" name="id" value="{{$user->id}}" />
                        <div>
                            <label for="name">Nom et Prénom</label>
                            <input type="text" name="name" value="{{$user->name}}" id="name" class="form-control" placeholder="Nom et Prénom" />
                        </div>
                        <div class="mt-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{$user->email}}" id="email" class="form-control" placeholder="email" />
                        </div>
                        <div class="form-group mt-2">
                            <label for="role">Rôle</label>
                            <select name="role" value="{{$user->role}}" class="form-control">
								<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
								<option value="assistance" {{ $user->role == 'assistance' ? 'selected' : '' }}>Assistance</option>
								<option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success w-100 m-auto">Update</button>
                        </div>
                    </div>
                </form>
			</section>
		</div>
	    @include('admin/inc/footer')
	</div>
    
	@if (session('successDelete'))
		<script>
			swal({
				position: 'top-end',
				icon: 'success',
				title: 'Cours deleted successfully!',
				timer: 3000
			});
		</script>
	@endif
@endsection

