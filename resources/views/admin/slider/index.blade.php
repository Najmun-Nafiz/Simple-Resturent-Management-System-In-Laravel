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
              @include('admin.message')
              <div class="card">
                  
                  <div class="card-header card-header-primary">
                  <a href="{{route('admin.slider.craete')}}">
                    <h4 class="card-title ">Add Slider</h4>
                  </a>
                </div>
              </br>
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">All Slider</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class=" table" style="width:100%">

                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sub_Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>

                      <tbody>
                  
                        
                        @foreach($sliders as $v_slider)
                          <tr>
                            <td>{{$v_slider -> id}}</td>
                            <td>{{$v_slider -> title}}</td>
                            <td>{{$v_slider -> sub_title}}</td>
                            <td class="center">
                              <img class="img-responsive img-thumbnail" src="{{URL('uploads/slider/'.$v_slider->image)}}"  style = "height : 60px; width : 60px;" alt="">
                              
                            </td>
                            <td>{{$v_slider -> created_at}}</td>
                            <td>{{$v_slider -> updated_at}}</td>
                            <td><a href="{{route('admin.slider.edit',$v_slider->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                            <a href="{{route('admin.slider.destroy',$v_slider->id)}}" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
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

