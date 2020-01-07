@extends('layouts.app')
@section('title','Slider')


@push('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
@endpush


@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
              </br>
              @include('admin.message');
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add New Slider</h4>
                </div>
                <br>
                <div class="card-content">
					<form action="{{ route('admin.slider.store')}}" method = "post" enctype="multipart/form-data">
						@csrf

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">Title</label>
									<input type="text" class="form-control" name = "title">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">Sub-Title</label>
									<input type="text" class="form-control" name = "sub_title">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								
									<label class="control-label">Image</label>
									<input type="file" class="form-control" name = "image">
							</div>
						</div>
						<a href="{{route('admin.slider.index')}}" class="btn btn-danger">Back</a>
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

