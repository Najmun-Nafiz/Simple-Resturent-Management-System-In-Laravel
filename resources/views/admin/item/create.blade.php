@extends('layouts.app')
@section('title','Item')


@push('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
@endpush


@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	@include('admin.message');
              <div class="card">
              </br>
              
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add New Item</h4>
                </div>
                <br>
                <div class="card-content">
					<form action="{{ route('admin.item.store')}}" method = "post" enctype="multipart/form-data">
						@csrf

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">Name</label>
									<input type="text" class="form-control" name = "name">
								</div>
							</div>
						</div>
						
						<div class="control-group" style="padding-bottom: 30px;">
							<label class="control-label" for="selectError3">Item Catagory</label>
							<div class="controls">
							  <select id="selectError3" name = "category_id" style="background: orange;color: white !important;cursor: pointer;">
								<option style="">Select Catagory <span style="color: white;">^^^</span></option>

                                   @foreach($categories as $v_categories)
										<option value = "{{$v_categories -> id}}">
											{{$v_categories -> title}}
										</option>
									@endforeach
								
							  </select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">Description</label>
									<input type="text" class="form-control" name = "description">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">Price</label>
									<input type="number" class="form-control" name = "price">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								
									<label class="control-label">Image</label>
									<input type="file" class="form-control" name = "image">
							</div>
						</div>
						<a href="{{route('admin.item.index')}}" class="btn btn-danger">Back</a>
						<button type="submit" class="btn btn-primary">Save</button>
					</form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#table').DataTable({
      'paging':true;
    });
} );
  </script>
@endpush

