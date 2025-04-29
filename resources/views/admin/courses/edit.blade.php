@extends('admin/layoutAdmin')

@section('title')
    Ouzood | admin | Edit Product  
@endsection 
@section('content')

		<div class="wrapper">
			<!-- Navbar -->
			 @include('admin/inc/navbar')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
            @include('admin/inc/sidebar')
			<!-- Content Wrapper. Contains page content -->
			@if ('2' == '1') 
               <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden"></span>
                    </div>
               </div>
            @else
                <div class="content-wrapper">
                    <section class="content-header">					
                        <div class="container-fluid my-2">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Edit Cours</h1>
                                </div>

                            </div>
                        </div>
                    </section>
                    <form action="{{route('cours.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$cours->id}}">
                        <section class="content">
                            <!-- Default box -->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">								
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="title">Title</label>
                                                            <input type="text" name="title" id="title" class="form-control rounded" value="{{$cours->title}}"  required>	
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="description">Description</label>
                                                            <textarea name="discription" id="description" cols="30" rows="10" class="summernote" >{!!$cours->discription!!}</textarea>
                                                        </div>
                                                    </div>                                            
                                                </div>
                                            </div>	                                                                      
                                        </div>                                    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">	
                                                <div class="mb-3">
                                                    <label for="is_trandy">Niveaux</label>
                                                    <select name="niveaux" id="is_trandy" class="form-control" required>
                                                        <option value="pr" {{ $cours->niveaux == 'pr' ? 'selected' : '' }}>primaire</option>
                                                        <option value="cl" {{ $cours->niveaux == 'cl' ? 'selected' : '' }}>college</option>                                            
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="is_trandy">Matier</label>
                                                    <select name="matier" id="is_trandy" class="form-control" required>
                                                        <option value="physiquechimie" {{ $cours->matier == 'physiquechimie' ? 'selected' : '' }}>Physique Chimie</option>
                                                        <option value="svt" {{ $cours->matier == 'svt' ? 'selected' : '' }}>Sciences de la vie et de la terre</option>
                                                        <option value="arabe" {{ $cours->matier == 'arabe' ? 'selected' : '' }}>Arabe</option>
                                                        <option value="islamique" {{ $cours->matier == 'islamique' ? 'selected' : '' }}>éducation eslamique</option>
                                                        <option value="francais" {{ $cours->matier == 'francais' ? 'selected' : '' }}>Francais</option>
                                                        <option value="maths" {{ $cours->matier == 'maths' ? 'selected' : '' }}>Maths</option>
                                                        <option value="englais" {{ $cours->matier == 'englais' ? 'selected' : '' }}>Englais</option>
                                                        <option value="sociales" {{ $cours->matier == 'sociales' ? 'selected' : '' }}>Sciences sociales</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="is_trandy">Statut</label>
                                                    <select name="statut" id="is_trandy" class="form-control" required>
                                                        <option value="pu" {{ $cours->statut == 'pu' ? 'selected' : '' }}>Gratuit</option>
                                                        <option value="pr" {{ $cours->statut == 'pr' ? 'selected' : '' }}>Payant</option>                                            
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-3 mt-3">
                                            <button type="submit w-100" class="btn btn-success fw-bold">Update</button> 
                                        </div>                
                                    </div>
                                    
                                </div>
                                
                                <div class="pb-5 pt-3">
                                    <a href="/admin/courses" class="w-25 btn btn-outline-danger ml-3">Cancel</a>
                                </div>
                            </div>
                            <!-- /.card -->
                        </section>
                    </form>
                
                    <!-- /.content -->
                </div>  
            @endif
			<!-- /.content-wrapper -->
			@include('admin/inc/footer')
@endsection 

