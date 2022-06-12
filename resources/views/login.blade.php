@extends('layouts.main')

@section('content')
  <section class="card-login container my-5">
    <div class="row no-gutters">
      <div class="col-lg-5">
        <img src="{{ asset('images/img_login.png') }}" alt="" class="d-none d-lg-block img-fluid" style="margin-left: -10px; height: 100%">
      </div>
      <div class="col-lg-7 px-5 pt-5">
          <div class="form-row">
            <div class="col-lg-12">
              <h3 style="text-align: center;">Welcome</h3>
              <p style="text-align: center; font-size: small; margin-bottom: 50px;">
                It's nice to see you, please sign in to continue
              </p>
            </div>
          </div>
          <form action="{{ route('login.store') }}" method="POST" id="login-form">
            @csrf
            
            <div class="form-row">
              <div class="col-lg-12">
                <input type="email" name="email" id="email" placeholder="Email Address" class="form-control my-3 px-4 py-3" value="{{ old('email') }}">
                @error('email')
                  <p id="error-email" class="text-danger">
                    {{ $errors->first('email') }}
                  </p>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-12">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control my-3 px-4 py-3" value="{{ old('password') }}" />
                @error('password')
                  <p id="error-password" class="text-danger">
                    {{ $errors->first('password') }}
                  </p>
                @enderror
              </div>
                <p class="text-end">
                <a href="{{ route('forgot') }}">
                  Forgot Password
                </a>
              </p>
            </div>
            <div class="form-row">
              <div class="col-lg-12">
                <button type="submit" class="btn btn-lg button-primary w-100 fs-6 mt-3 mb-5" id="login-button">
                  Login
                </button>
              </div>
            </div>
          </form>
          <p class="text-center">
            Don't have an account? Please <a href="/register">Register</a>
          </p>
      </div>
    </div>
  </section>
@endsection

@push('styles')
<style>
  .card-login {
    background: #F5F5F5;
    border-radius: 30px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  }
</style>
@endpush