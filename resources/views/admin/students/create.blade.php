@extends('admin/layoutAdmin')

@section('title')
Binajah | admin | Create Student 
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
							<h1>Créer un Etudiant</h1>
						</div>
						{{-- <div class="col-sm-6 text-right">
							<a href="/admin/Courses/Create" class="btn btn-success fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">New Courses</a>
						</div> --}}
					</div>
				</div>
			</section>
			<section class="content">
				@if (session('success'))
					<div class="alert alert-success">{{ session('success') }}</div>
				@endif
				
				@if (session('error'))
					<div class="alert alert-danger">{{ session('error') }}</div>
				@endif
				
				<form action="{{ route('students.create') }}" method="POST">
					@csrf
					<div class="container-fluid shadow p-3 w-50 m-auto">
						<div>
							<label for="name">Nom et Prénom</label>
							<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom et Prénom" value="{{ old('name') }}">
							@error('name')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
				
						<div class="mt-2">
							<label for="tel">Téléphone</label>
							<input type="number" name="tel" id="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="0632765364" value="{{ old('tel') }}">
							@error('tel')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
				
						<div class="mt-2">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{ old('email') }}">
							@error('email')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
				
						<div class="mt-2">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
							@error('password')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
				
						<div class="form-group mt-2">
							<label for="role">Status</label>
							<select name="status" class="form-control @error('status') is-invalid @enderror">
								<option value="oui" {{ old('status') == 'oui' ? 'selected' : '' }}>Subscriber</option>
								<option value="non" {{ old('status') == 'non' ? 'selected' : '' }}>Not subscribed</option>
							</select>
							@error('status')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
				
						<div class="mt-3">
							<button type="submit" class="btn btn-success w-100 m-auto">Register</button>
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

