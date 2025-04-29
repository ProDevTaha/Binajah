@extends('admin/layoutAdmin')

@section('title')
Binajah| admin | Users 
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
							<h1>Users</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="/admin/register" class="btn btn-success fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">New Users</a>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
							<form  action="{{route('user.search')}}" method="POST">
								@csrf
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
											<th>name</th>
											<th>role</th>
											<th>email</th>
											<th>Date</th>
											<th>Action</th>
										</tr> 
									</thead>
									<tbody>
										@foreach ($users as $user)
											<tr >
												<td>{{$user->name}}</td> 
												<td>{{ $user->role }} </td>
												<td>{{ $user->email }} </td>																	
												<td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
												<td class="d-flex">
													<div class="d-flex justify-content-between">
														<form method="POST" action="{{ route('user.delete', $user->id) }}">
															@csrf
															<input name="_method" type="hidden" value="DELETE">
															<button type="submit" class="btn btn-xs btn-danger btn-flat rounded px-3  show_confirm " data-toggle="tooltip" title='Delete' >Delete</button>
														</form>
														<a href="/admin/users/update/{{$user->id}}">
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
									{{ $users->links('pagination::bootstrap-5') }}
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
					title: `Are you sure you want to delete this User?`,
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

	@if (session('deleteSuccess'))
		<script>
			swal({
				position: 'top-end',
				icon: 'success',
				title: 'student delete successfuly',
				timer: 3000
			});
		</script>
	@endif
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