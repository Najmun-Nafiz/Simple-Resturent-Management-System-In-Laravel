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
              <div class="card">
                  @include('admin.message')
                 {{--  <div class="card-header card-header-primary">
                  <a href="{{route('admin.reserve.craete')}}">
                    <h4 class="card-title ">Add Item</h4>
                  </a>
                </div> --}}
              </br>
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">{{ $contact->subject }}</h4>
                  
                </div>
                <div class="card-content">
                  <div class="row">
                  	<div class="col-md-12">
  						<div class="information" style="padding: 50px 70px;">
  							<b><strong>Name : </strong>{{ $contact->name }}</b></br>
  							<b><strong>Email : </strong>{{ $contact->email }}</b></br>
  							<p><strong><b>Message :</b> </strong>{{ $contact->message }}</p>
  						</div>
              			<a href="{{ route('admin.message.index') }}" class="btn btn-danger">Back</a>
  						<a href="{{ route('admin.message.reply',$contact->id) }}" class="btn btn-info">Reply</a>
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

