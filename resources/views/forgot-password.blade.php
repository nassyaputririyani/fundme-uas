@extends('layouts.main')

@section('content')
<section class="card-login container my-5">
  <div class="row no-gutters">
    <div class="col-lg-5">
      <img src="{{ asset('images/img_forget.png') }}" alt="" class="d-none d-lg-block" style="margin-left: 70px;">
    </div>
    <div class="col-lg-7 px-5 pt-5">
      <form action="{{ route('forgot.store') }}" method="POST" style="justify-content: safe center;">
        @csrf

        <div class="form-row">
          <div class="col-lg-12">
            <h3 style="text-align: center;">Forgot your password?</h3>
            <p style="text-align: center; font-size: small; margin-bottom: 100px;">
              You can reset your password here. 
            </p>
          </div>
        </div>

        <div class="form-row">
          <div class="col-lg-7" style="margin-left: 130px;">
            <input type="email" name="email" placeholder="Email Address" class="form-control my-3 px-4 py-3">
            @error('email')
              <p id="error-email" class="text-danger">
                {{ $errors->first('email') }}
              </p>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="col-lg-7" style="margin-left: 130px;">
            <button type="submit" class="btn btn-lg button-primary w-100 fs-6 mt-3 mb-5">
              Reset Password
            </button>
          </div>
        </div>
      </form>
      <p class="text-center">
        Already have an account? Please <a href="{{ route('login') }}">Login</a>
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