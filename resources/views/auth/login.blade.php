@extends('layouts.app')
@section('title','Login')


@push('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
@endpush


@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-md-offset-1">
              <div class="card">
              </br>
              @include('admin.message');
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Log In</h4>
                </div>
                <br>
                <div class="card-content">
                    <form action="{{ route('login')}}" method = "post">
                        @csrf

                        <div class="row" style="margin-left: 10px;">
                            <div class="col-md-10">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" name = "email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-left: 10px;">
                            <div class="col-md-10">
                                <div class="form-group label-floating">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control" name = "password" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{route('password.request')}}" class="btn btn-danger">Forget Password</a>
                        <a href="{{route('register')}}" class="btn btn-primary"> Register</a>
                        
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

