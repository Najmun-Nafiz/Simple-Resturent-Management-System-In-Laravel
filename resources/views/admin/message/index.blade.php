@extends('layouts.app')
@section('title','Message')


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
                  
                 
              </br>
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">All Message</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class=" table" style="width:100%">

                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Sent At</th>
                        <th>Action</th>
                      </thead>

                      <tbody>
                  
                        
                        @foreach($contacts as $v_contact)
                          <tr>
                            <td>{{$v_contact -> id}}</td>
                            <td>{{$v_contact -> name}}</td>
                            <td>{{$v_contact -> subject}}</td>
                            <td>{{$v_contact -> created_at}}</td>
                            <td><a href="{{route('admin.message.show',$v_contact->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                            <a href="{{route('admin.message.destroy',$v_contact->id)}}" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a></td>
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

