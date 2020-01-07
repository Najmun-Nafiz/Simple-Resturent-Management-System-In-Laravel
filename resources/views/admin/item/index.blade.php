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
              <div class="card">
                  @include('admin.message')
                  <div class="card-header card-header-primary">
                  <a href="{{route('admin.item.craete')}}">
                    <h4 class="card-title ">Add Item</h4>
                  </a>
                </div>
              </br>
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">All Item</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class=" table" style="width:100%">

                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                      </thead>

                      <tbody>
                  
                        
                        @foreach($items as $key=>$v_items)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$v_items -> name}}</td>

                            <td class="center">
                              <img class="img-responsive img-thumbnail" src="{{URL('uploads/item/'.$v_items->image)}}"  style = "height : 60px; width : 60px;" alt="">
                            </td>

                            <td>{{$v_items -> category->title }}</td>
                            <td>{{$v_items -> description }}</td>
                            <td>{{$v_items -> price }}</td>
                            <td>
                              <a href="{{ route('admin.item.edit',$v_items->id) }}" class="btn btn-info btn-sm">
                                <i class="material-icons">mode_edit</i>
                              </a>

                              <a href="{{route('admin.item.destroy',$v_items->id)}}" class="btn btn-danger btn-sm">
                                <i class="material-icons">delete</i>
                              </a>
                          </td>
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

