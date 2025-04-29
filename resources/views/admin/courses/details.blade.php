@extends('admin/layoutAdmin')

@section('title')
    Ouzood | admin | Product Deails | {{$product[0] ->title}}  
@endsection 
@section('content')
    <!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			 @include('admin/inc/navbar')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
            @include('admin/inc/sidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Product Details</h1>
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
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">								
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Title</label>
                                                    <span>
                                                       <h5 style="background-color: rgb(215, 237, 255);" class=" p-3 rounded">{{$product[0] ->title}}</h5>
                                                    </span>	
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea disabled  id="myTextarea" name="description" id="description" cols="30" rows="10" class="summernote"  >
                                                        {{$product[0] ->description}}
                                                    </textarea>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>	                                                                      
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body" >
                                        <h2 class="h4 mb-3">Images</h2>								
                                        <div class="d-flex justify-content-center flex-wrap rounded" style="background-color: rgb(215, 237, 255)">
                                            @foreach ($product[0]->images as $item)
                                                <div class="d-flex justify-content-center flex-wrap dz-message needsclick rounded "  style="border: dashed rgb(51, 196, 228);background-color: #eeeeee">  
                                                    <img src="{{ asset('storage/images/products/' .$item->image) }}"  name="image"  style="max-height:200px">                                    
                                                </div>
                                            @endforeach
                                           
                                        </div>
                                    </div>	                                                                      
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Pricing</h2>								
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="price">Price</label>
                                                    <h5 style="background-color: rgb(215, 237, 255)" class=" p-3 rounded">{{$product[0]->price}}€</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="compare_price">Compare at Price</label>
                                                    <h5 style="background-color: rgb(215, 237, 255)" class=" p-3 rounded">{{$product[0] ->c_price}}€</h5>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>	                                                                      
                                </div>
                                {{-- <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Quantity</h2>								
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="sku">SKU (Stock Keeping Unit)</label>
                                                    <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">	
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="barcode">Barcode</label>
                                                    <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                                </div>
                                            </div>   
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" checked>
                                                        <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">	
                                                </div>
                                            </div>                                         
                                        </div>
                                    </div>	                                                                      
                                </div> --}}
                            </div>
                            <div class="col-md-4">
                                {{-- <div class="card mb-3">
                                    <div class="card-body">	
                                        <h2 class="h4 mb-3">Product status</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>  --}}
                                <div class="card">
                                    <div class="card-body">	
                                        <div class="mb-3">
                                            <label for="is_trandy">Is Trandy</label>
                                          @if ($product[0] ->is_trandy == "0")
                                            <h5 style="background-color: rgb(215, 237, 255)"  class=" p-3 rounded">NON</h5>
                                          @else
                                            <h5 style="background-color: rgb(215, 237, 255)" class=" p-3 rounded">OUI</h5> 
                                          @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="is_trandy">Percentage</label>
                                            <h5 style="background-color: rgb(215, 237, 255)"  class=" p-3 rounded">-{{$product[0] ->percentage}}%</h5> 
                                        </div>
                                        <div class="mb-3">
                                            <label for="is_trandy">In Offer</label>
                                            @if ($product[0] ->in_offer == "0")
                                                <h5 style="background-color: rgb(215, 237, 255)"  class=" p-3 rounded">NON</h5>
                                            @else
                                                <h5 style="background-color: rgb(215, 237, 255)" class=" p-3 rounded">OUI</h5> 
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                                {{-- <div class="card mb-3">
                                    <div class="card-body">	
                                        <h2 class="h4 mb-3">Product brand</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Apple</option>
                                                <option value="">Vivo</option>
                                                <option value="">HP</option>
                                                <option value="">Samsung</option>
                                                <option value="">DELL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>  --}}
                                <div class="card mb-3">
                                    <div class="card-body">	
                                        <h2 class="h4 mb-3">Quantity</h2>
                                        <div class="mb-3">
                                            <h5 style="background-color: rgb(215, 237, 255)" class=" p-3 rounded">{{$product[0]->qty}}</h5> 
                                        </div>
                                    </div>
                                    
                                </div>  
                              
                                <div class="card mb-3">
                                    <div class="card-body ">	
                                        <h2 class="h4 mb-3">Size</h2>
                                        <div class="d-flex justify-content-around" style="background-color: rgb(215, 237, 255)">
                                           @foreach ($sizes as $size)
                                                <div class="form-check" >
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                                        {{$size->size}} 
                                                    </label>
                                                </div>	 
                                           @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">	
                                        <h2 class="h4 mb-3">Colors</h2>
                                        @foreach ($colores as $colore)
                                            <div class="row" style="background-color: rgb(215, 237, 255)">
                                                <div class="col-1">
                                                    <div class="form-check" >
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                                        <label class="form-check-label" for="flexCheckCheckedDisabled">
                                                          {{$colore->color}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                </div>  
                              
                                                                
                            </div>
                            
                        </div>
                        
                        <div class="pb-5 pt-3">
                            <a href="/admin/Products" class="w-25 btn btn-outline-danger ml-3">Cancel</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
			
				<!-- /.content -->

                <script>
                    document.getElementById("myTextarea").readOnly = true;
                </script>
			</div>
			<!-- /.content-wrapper -->
			@include('admin/inc/footer') 
@endsection 

