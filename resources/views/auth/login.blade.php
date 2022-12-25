
@extends('layouts.home')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded shadow">
              <div class="row">
                <div class="col-4 col-lg-4">
                  <img src="{{asset('home/images/logo.png')}}" style="width:85%" alt="logo">
                </div>
                <div class="col-8 col-lg-8">
                  <h4>Hello! let's get started</h4>
                  <h6 class="font-weight-light">Sign in to continue.</h6>
                </div>
              </div>
              <div class="my-3 fs-6">
                @if (session()->has('msg'))
                <div class="alert alert-danger fw-bold " role="alert">
                  These credentials do not match our records.
                </div>
                @endif
              </div>
              <form class="pt-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputEmail1" placeholder="{{ __('Email Address') }}">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror form-control-lg" id="exampleInputPassword1" placeholder="{{ __('Password') }}">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="mt-3">
               <input type="submit" value="SGIN IN" class="btn btn-primary text-light">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}> 
                      {{ __('Remember Me') }}
                    </label>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@endsection