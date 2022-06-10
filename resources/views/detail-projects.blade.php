@extends('layouts.main')

@section('content')
     <!-- Main -->
     <main>
      <!-- Heading -->
      <div class="pb-5">
          <img src="{{ $project->image_url }}" alt="Detail Project" class="w-100" style="object-fit: cover" height="350px">

          <div class="container py-5">
              <div class="row">
                    <div class="col-md-7">
                        <p id="title" class="fs-3">
                            {{ $project->title }}
                        </p>

                        <p id="short-description" class="fw-light fs-6 mt-3" style="color: #6B7588;">
                            {{ $project->short_description }}
                        </p>

                        <p class="mt-5 fs-3">
                            Description
                        </p>

                        <p id="long-description" class="fw-light fs-6 mt-3" style="color: #6B7588;">
                            {{ $project->description }}
                        </p>

                        <div class="d-flex bd-highlight mt-4">
                            <div class="bd-highlight me-5">
                                <a href="javascript:void(0)" id="business-proposal" style="text-decoration: none;">
                                    <p class="fs-5 pb-3 fw-bold detail-choose" id="business-text" style="color: #3F72AF;">
                                        Business Proposal
                                    </p>
                                </a>
                            </div>
                            <div class="ms-5 bd-highlight text-center" id="goals">
                                <a href="javascript:void(0)" style="text-decoration: none;">
                                    <p class="fs-5 pb-3 fw-bold" id="goals-text" style="color: #3F72AF;">
                                        Goals
                                    </p>
                                </a>
                            </div>
                        </div>

                        <a href="javascript:void(0)" id="list-business" class="d-block" style="text-decoration: none;">
                            <div class="d-flex mt-3">
                                <i class="fa fa-file" style="font-size: 30pt; color: #6B7588"></i>
                                <div class="ms-4">
                                    <p style="margin: 0; color: #6B7588;">
                                        {{ $project->business_proposal_url }}
                                    </p>
                                    <p style="margin: 0; color: #C7C9D9">
                                        1.24 MB
                                    </p>
                                </div>
                            </div>
                        </a>

                        <div class="list-goals d-none w-100 mt-2" id="list-goals">
                            <ul>
                                <li class="mb-4">
                                    First Goals
                                </li>
                                <li class="mb-4">
                                    Second Goals
                                </li>
                                <li class="mb-4">
                                    Third Goals
                                </li>
                                <li class="mb-4">
                                    Fourth Goals
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4 mt-5 mt-lg-0">
                        <div class="card-invest shadow p-4 bg-white">
                            <h3 class="fs-5" style="color: #112D4E;">
                                Make an investment
                            </h3>

                            <p class="fw-light fs-6 mt-4" style="color: #6B7588;">
                                Choose amount
                            </p>

                            <form action="{{ route('project.fund-project', $project->id) }}" method="POST">
                                @csrf

                                <div id="amount-selection" class="d-flex flex-wrap gap-3 amount-selection">
                                    <div class="flex-grow-1">
                                        <div class="select-amount" id="select-amount-1">
                                            <p class="text-center w-100 py-3 fs-6 fw-bold" style="margin: 0;">
                                                Rp100.000
                                            </p> 
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="select-amount" id="select-amount-2">
                                            <p class="text-center w-100 py-3 fs-6 fw-bold" style="margin: 0;">
                                                Rp200.000
                                            </p> 
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="select-amount" id="select-amount-3">
                                            <p class="text-center text-center w-100 py-3 fs-6 fw-bold" style="margin: 0;">
                                                Rp500.000
                                            </p> 
                                        </div>
                                    </div>
                                </div>

                                <p class="fw-light fs-6 mt-4" style="color: #6B7588;">
                                    or enter amount
                                </p>

                                <input type="number" id="amount-input" name="amount" placeholder="enter amount..." class="form-control form-amount">
                                @error('amount')
                                    <p class="text-danger">
                                        {{ $errors->first('amount') }}
                                    </p>
                                @enderror

                                @auth
                                    <button type="submit" class="btn button-primary w-100 btn-lg fs-6 mt-5 py-2">
                                        Proceed
                                    </button>
                                @endauth
                                @guest
                                    <a class="btn button-primary w-100 btn-lg fs-6 mt-5 py-2 disabled" href="../login/index.php">
                                        Login to continue
                                    </a>
                                @endguest
                            </form>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </main>
@endsection