@extends('layouts.app')
@section('title','Dashboard')

@push('css')
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Category/Item</p>
                  <h3 class="card-title">{{ $categories }} / {{ $items }}
                    <small></small>
                  
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">info</i>
                    <a href="#pablo">Total Category And Item</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">slideshow</i>
                  </div>
                  <p class="card-category">Slider</p>
                  <h3 class="card-title">{{ $sliders }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> <a href="{{ route('admin.slider.index') }}">Get more details..</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Reservations</p>
                  <h3 class="card-title">{{ $reservations->count() }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> <a href="{{ route('admin.reservation.index') }}">Not Confirmed Reservations..</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Notifications</p>
                  <h3 class="card-title">{{ $contacts->count() }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i><a href="{{ route('admin.message.index') }}">Update Notifications..</a> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          
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
                            <th>
                              @if($v_reservation -> status == true)
                                <span class="alert-success" style="color: black;">Confirmed</span>
                              
                              @else
                                <span class="alert-danger" style="color: black;">Not Confirmed</span>
                              
                              @endif
                            </th>


                             <th>
                              @if($v_reservation -> status == true)
                                <a href="{{ route('admin.reservation.not_confirm',$v_reservation->id) }}" class="btn btn-info btn-sm"><i class="fa fa-times" aria-hidden="true"></i></a>
                              
                              @else
                                <a href="{{ route('admin.reservation.confirm',$v_reservation->id) }}" class="btn btn-info btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>

                                <a href="{{route('admin.reservation.destroy',$v_reservation->id)}}" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
                              
                              @endif
                            </th>
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
          
        </div>
      </div>
@endsection

@push('scripts')
@endpush

