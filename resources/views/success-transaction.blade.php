@extends('layouts.main')

@section('content')
  <main class="container" style="padding-bottom: 200px;">
    <div class="row align-items-center pb-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow border px-5 py-5" style="border-radius: 20px;">
                <div class="card-body d-flex flex-column align-items-center">
                    <img class="card-img-top" src="{{ asset('images/success.png') }}" alt="Card image">
                    <p class="card-text mt-4" style="text-align: center;">Your investment is successfull, the organization of project will contact you.</p>
                    <a href="{{ route('index') }}" class="btn btn-primary btn-lg mt-4">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
  </main>
@endsection

@push('styles')
  <style>
    .btn {
          height: 100%;
          width: 100%;
          color: #fff;
          background: #112D4E;
          font-size: 16px;
          border-radius: 6px;
          border: none;
      }
      
      btn:hover {
          background: #3F72AF;
      }
  </style>
@endpush