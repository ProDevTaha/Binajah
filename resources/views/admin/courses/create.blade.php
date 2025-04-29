@extends('admin/layoutAdmin')

@section('title')
    Binajah | admin | Create Courses  
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
								<h1>Create Courses</h1>
							</div>

						</div>
					</div>
				</section>
                <form action="{{route('create.course')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">								
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control rounded" placeholder="Title" required>	
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="title">Image</label>
                                                        <input type="file" name="img_course" id="imageCourse" credits="false" class="filepond mt-2" required>	
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="description">Description</label>
                                                        <textarea name="discription" id="description" cols="30" rows="10" class="summernote" placeholder="Description" required></textarea>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div>	                                                                      
                                    </div>
                                    <div class="card">
                                        <div class="card-body" >
                                            <label class="d-flex p-2 justify-content-between">
                                                <span>Videos <span style="font-size:12px">recommended 100px/100px</span></span>
                                                <span class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" onclick="lessWarranty()" fill="currentColor" id="lessButton" class="bi bi-x-circle-fill" viewBox="0 0 16 16" style="cursor:pointer;color: red;display:none;">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" onclick="moreWarranty()" fill="currentColor" class="bi bi-x-circle-fill ms-1" viewBox="0 0 16 16" style="color: blue;cursor: pointer;">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                                </svg>
                                                </span>
                                            </label>			
                                            <div id="warranty">
                                                <div id="content" class=" mb-2"> 
                                                    <input type="text" name="title1" class="form-control" placeholder="title" />
                                                    <input type="file" name="video1" id="video_course1" credits="false" class="filepond mt-2" data-max-file-size="200MB"/>
                                                </div>
                                            </div>
                                        </div>	   
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="category">Niveaux</label>
                                                <select name="niveaux" id="niveaux" class="form-control" required>
                                                    <option value="pr" selected>primaire</option>
                                                    <option value="cl">college</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="category">Matiere</label>
                                                <select name="matier" id="matier" class="form-control" required>
                                                        <option value="" selected>Matiere</option>
                                                        <option value="physiquechimie">Physique Chimie</option>
                                                        <option value="svt">sciences de la vie et de la terre</option>
                                                        <option value="arabe">arabe</option>
                                                        <option value="islamique">éducation eslamique</option>
                                                        <option value="francais">francais</option>
                                                        <option value="maths">maths</option>
                                                        <option value="englais">englais</option>
                                                        <option value="sociales">sciences sociales</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="is_trandy">Statut</label>
                                                <select name="statut" id="is_trandy" class="form-control" required>
                                                    <option value="pu">public</option>
                                                    <option value="pr">private</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 mt-3">
                                        <button type="submit w-100" class="btn btn-success fw-bold">Create</button> 
                                    </div>           
                                    </div>                      
                                </div>
                                
                            </div>
                            
                            <div class="pb-5 pt-3">
                                <a href="/admin/Products" class="w-25 btn btn-outline-danger ml-3">Cancel</a>
                            </div>
                        </div>
                    </section>
                </form>
			</div>
            @if (session('success_create'))
                <script>
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product Cteated Successfully',
                        showConfirmButton: false,
                        timer: 3000
                    });
                </script>
            @endif 
            
			<script src="{{asset('js/handelCourses.js')}}"></script>
			@include('admin/inc/footer')
@endsection 

