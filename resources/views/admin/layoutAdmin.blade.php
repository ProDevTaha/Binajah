<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="{{asset("img/favicon.ico")}}" rel="icon">
		<title>@yield('title')</title>
		<!-- Google Font: Source Sans Pro -->
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
		{{-- filepond --}}
		<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
		{{-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> --}}
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		{{-- bootstrap CDN --}}
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
		{{-- bootstrap CDN --}}
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/dropzone/dropzone.css')}}">

		<link rel="stylesheet" href="{{asset("admin/css/adminlte.min.css")}}">
		<link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
	</head>
	<body class="hold-transition sidebar-mini">
		@yield('content')
        
	<!-- Bootstrap 4 -->
	<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	{{-- <script src="{{asset('admin/js/demo.js')}}"></script> --}}
	<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
	<script src="{{asset('admin/plugins/dropzone/dropzone.js')}}"></script>
	
	<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
	<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
	

	<script>		
		// Register the plugin
		FilePond.registerPlugin(FilePondPluginImagePreview);
		// Get a reference to the file input element
		const inputElement  = document.querySelector('#productimages');
		// Create a FilePond instance
		const pond  = FilePond.create(inputElement);
		FilePond.setOptions({
			server: {
				process: '/admin/Products/Create/UploadImage',
				revert: '/admin/Products/Create/deleteImage',
				method : 'POST',
				headers : {
					'X-CSRF-TOKEN':'{{csrf_token()}}'
				}
			},
		});
	</script>
	<script>
		Dropzone.autoDiscover = false;   
		   // Summernote
		   $('.summernote').summernote({
				height: '300px'
			}); 
			const dropzone = $("#image").dropzone({ 
				maxFiles: 5,
				addRemoveLinks: true,
				acceptedFiles: "image/jpeg,image/png,image/gif",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function (file, response) {
					$("#image_id").val(response.image_id);
				}
			});

	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

	<!-- Include jQuery library -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<!-- Include jQuery UI library -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- Include other scripts -->
	<script src="{{asset('admin/js/jquery.loadingModal.js')}}"></script>
	
	</body>
</html>