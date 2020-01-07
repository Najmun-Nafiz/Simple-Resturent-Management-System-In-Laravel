@extends('layouts.app')
@section('title','Reservation')


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

                  <h4 class="card-title ">All Reservation</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class=" table" style="width:100%">

                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Ordered At</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>

                      <tbody>
                  
                        
                        @foreach($reservations as $key=>$v_reservation)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$v_reservation -> name}}</td>
                            <td>{{$v_reservation -> email}}</td>
                            <td>{{$v_reservation -> phone}}</td>
                            <td>{{$v_reservation -> created_at}}</td>
                            <td>
                            	@if($v_reservation -> status == true)
                            		<span class="alert-success" style="color: black;">Confirmed</span>
                            	
                            	@else
	                            	<span class="alert-danger" style="color: black;">Not Confirmed</span>
	                            
	                            @endif
                            </td>


							             
                            <td>
                            	@if($v_reservation -> status == true)
                            		<a href="{{ route('admin.reservation.not_confirm',$v_reservation->id) }}" class="btn btn-info btn-sm"><i class="fa fa-times" aria-hidden="true"></i></a>
                            	
                            	@else
	                            	<a href="{{ route('admin.reservation.confirm',$v_reservation->id) }}" class="btn btn-info btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
	                            
	                            @endif
                              
                           
                              
                                <a href="{{route('admin.reservation.destroy',$v_reservation->id)}}" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
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
  {!! Toastr::message() !!}
  <script>
    $(document).ready(function() {
    $('#table').DataTable({
      'paging':true;
    });
} );
  </script>

@endpush

