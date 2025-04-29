@extends('admin/layoutAdmin')
@section('title')
EdDrass+ | admin | dashboard
@endsection 
@section('content')

	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

	<div class="wrapper">
		    @include('admin/inc/navbar')
			@include('admin/inc/sidebar')
			<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">					
				<div class="container-fluid">
					<div>
						{{-- <video style="width:100%;border-radius: 10px;margin-bottom:10px" autoplay muted loop>
							<source src="{{ asset('admin/img/trial.mp4') }}" type="video/mp4">
							<source src="{{ asset('admin/img/trial.mp4') }}" type="video/webm">
							<source src="{{ asset('admin/img/trial.mp4') }}" type="video/ogg">
						</video> --}}
					</div>
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Dashboard</h1>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6 col-6">							
							<div class="small-box card">
								<div class="inner">
									<h4 class="fw-bold">{{$studets}} Students</h4>
									<p>Total Students</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-6 col-6">							
							<div class="small-box card">
								<div class="inner">
									<h4 class="fw-bold">{{$studets_ins}} Subscribers</h4>
									<p>Total Subscribers</p>
								</div>
							</div>
						</div>
					</div>
				</div>					
				<!-- /.card -->
			</section>
			<div class="p-3 m-auto" style="width:50%;">
				<canvas id="funnelsAnsProductsChart" ></canvas>
			</div>
			<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@1.0.0"></script>
	
			<script>
				document.addEventListener('DOMContentLoaded', function () {
					const productsCount = {{ $studets }};
					const funnelsCount = {{ $studets_ins }};
					const ctx = document.getElementById('funnelsAnsProductsChart').getContext('2d');
					const ordersChart = new Chart(ctx, {
						type: 'pie',
						data: {
							labels: [
								'Subscribers',
								'Students'
							],
							datasets: [{
								label: 'My First Dataset',
								data: [productsCount, funnelsCount], // Assuming 50 is the count of funnels
								backgroundColor: [
									'rgb(54, 162, 235)',
									'#186aff'
								],
								hoverOffset: 4
							}]
						}
					});
				});
			</script>
		</div>
		@include('admin/inc/footer')
	</div>
@endsection 