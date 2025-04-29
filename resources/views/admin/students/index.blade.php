@extends('admin/layoutAdmin')

@section('title')
Binajah | admin | Students 
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
							<h1>Students</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="/admin/newStudent" class="btn btn-success fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">New Student</a>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
							<form  action="{{route('student.search')}}" method="POST">
								@csrf
								<div class="card-tools">
									<div class="input-group input-group" style="width: 250px;">
										<input type="text" name="query" class="form-control float-right rounded-start "  placeholder="example@gmail.com">
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
											<th>Name</th>
											<th>Phone</th>
											<th>Emal</th>
											<th>Status</th>
											<th>Date</th>
											<th>Action</th>
										</tr> 
									</thead>
									<tbody>
										@foreach ($students as $student)
											<tr >
												<td>{{ $student->name }}</td> 
												<td>{{ $student->tel  }} </td>
												<td>{{ $student->email }} </td>																	
												<td class="text-start">
													<span class="badge position-absolute px-3 mt-1 py-1 rounded-pill" style="background-color: {{ $student->status === 'oui' ? '#28a745' : '#dc3545' }}; color: white;">
														{{ $student->status === 'oui' ? 'OUI' : 'NON' }}
													</span>													
												</td>																
												<td>{{ \Carbon\Carbon::parse($student->created_at)->format('d/m/Y') }}</td>
												<td class="d-flex">
													<div class="d-flex justify-content-between">
														<form method="POST" action="{{ route('student.delete', $student->id) }}">
															@csrf
															<input name="_method" type="hidden" value="DELETE">
															<button type="submit" class="btn btn-xs btn-danger btn-flat rounded px-3  show_confirm " data-toggle="tooltip" title='Delete' >Delete</button>
														</form>
														<a href="/admin/students/update/{{$student->id}}">
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
									{{ $students->links('pagination::bootstrap-5') }}
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
					title: `Are you sure you want to delete this Student?`,
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

	@if (session('successRegister'))
		<script>
			swal({
				position: 'top-end',
				icon: 'success',
				title: 'student created successfully ! ',
				timer: 3000
			});
		</script>
	@endif
	@if (session('successDelete'))
		<script>
			swal({
				position: 'top-end',
				icon: 'success',
				title: 'student deleted successfully ! ',
				timer: 3000
			});
		</script>
	@endif
	@if (session('successUpdate'))
		<script>
			swal({
				position: 'top-end',
				icon: 'success',
				title: 'student updated successfully ! ',
				timer: 3000
			});
		</script>
	@endif
@endsection