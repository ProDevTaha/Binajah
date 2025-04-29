@extends('admin/layoutAdmin')

@section('title')
EdDrass+| admin | Courses 
@endsection 

@section('content')

	<div class="wrapper">	
		@include('admin/inc/navbar')
		@include('admin/inc/sidebar')
		<div class="content-wrapper">
			<section class="content-header">					
				<div class="container-fluid my-2">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Courses</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="/admin/Courses/Create" class="btn btn-success fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">New Courses</a>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
							<form >
								<div class="card-tools">
									<div class="input-group input-group" style="width: 250px;">
										<input type="text" name="query" class="form-control float-right rounded-start "  placeholder="Search">
										<div class="input-group-append">
											<button type="submit" class="btn btn-default">
												<i class="fas fa-search"></i>
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="card-body table-responsive p-0">								
							{{-- @if ($Courses->isEmpty())
								<div class="text-center">
									<img src="{{asset('img/CoursesDefault.png')}}" style="height:200px;margin:auto" alt="order image">
								</div>
							@else --}}
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th>Cours</th>
											<th>Matier</th>
											<th>Niveaux</th>
											<th>Statut</th>
											<th>Created By</th>
											<th>Date</th>
											<th>Action</th>
										</tr> 
									</thead>
									<tbody>
										@foreach ($courses as $course)
											<tr >
												<td><span style=" display: block;width: 150px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{$course->title}}</span></td> 
												<td>{{$course->matier}}</td> 
												<td>{{ $course->niveaux === 'pr' ? 'Primaire' : 'College' }} </td>
												<td class="text-start">
													<span class="badge position-absolute px-3 mt-1 py-1 rounded-pill" style="background-color: {{ $course->statut === 'pu' ? '#28a745' : '#dc3545' }}; color: white;">
														{{ $course->statut === 'pu' ? 'Gratuit' : 'Payant' }}
													</span>													
												</td>									
												<td>Taha Dourhmi</td>
												<td>{{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y') }}</td>
												<td class="d-flex">
													<div class="d-flex justify-content-between">
														<form method="POST" action="{{ route('cours.delete', $course->id) }}">
															@csrf
															<input name="_method" type="hidden" value="DELETE">
															<button type="submit" class="btn btn-xs btn-danger btn-flat rounded px-3  show_confirm " data-toggle="tooltip" title='Delete' >Delete</button>
														</form>
														<a href="/admin/Courses/update/{{$course->id}}">
															<button type="submit" class="btn btn-xs btn-success  btn-flat rounded ml-2 px-3" data-toggle="tooltip" title='Update' >Edit</button>														
														</a>
													</div> 
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							{{-- @endif									 --}}
						</div>
						<div class="d-flex card-footer justify-content-center mt-3">
							<nav aria-label="Page navigation">
								<ul class="pagination">
									{{ $courses->links('pagination::bootstrap-5') }}
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</section>
		</div>
	    @include('admin/inc/footer')
	</div>
    
	<script type="text/javascript">
		$('.show_confirm').click(function(event) {
			var form = $(this).closest("form");
			var name = $(this).data("name");
			event.preventDefault();
			swal({
					title: `Are you sure you want to delete this Cours?`,
					text: "If you delete this, it will be gone forever.",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						form.submit();
					}
				});
		});
	</script>

	@if (session('successCreated'))
		<script>
			swal({
				position: 'top-end',
				icon: 'success',
				title: 'Cours saved successfully!',
				timer: 3000
			});
		</script>
	@endif
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
	@if (session('Course not found'))
		<script>
			swal({
				position: 'top-end',
				icon: 'issue',
				title: 'Course not found !',
				timer: 3000
			});
		</script>
	@endif
	@if (session('successUpdate'))
		<script>
			swal({
				position: 'top-end',
				icon: 'success',
				title: 'Cours updated successfully ! ',
				timer: 3000
			});
		</script>
	@endif
@endsection