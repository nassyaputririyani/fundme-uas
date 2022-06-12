@extends('layouts.main')
@section('content')
    <!-- Main -->
    <main>
        <!-- Heading -->
        <div class="container-fluid py-5">
            <div class="row px-2 px-lg-5 pb-lg-5 py-lg-5 mb-lg-5">
                <div class="col-md-6 d-block d-lg-none">
                    <img src="images/header.png" alt="Header image" class="mb-5 w-100" style="margin-top: -50px;">
                </div>
                <div class="col-md-6">
                    <h1 class="fs-1 w-100 w-lg-75" style="font-weight: 600;">
                        Investment and Be a Part of the Project Development 
                    </h1>
                    <p class="fs-5 mt-4 mt-lg-4 w-100 w-lg-75" style="color: #8F90A6; font-weight: 300">
                        Let`s make people dreams come true. 
                        You can invest your money through this website and 
                        you will be able to contribute then get your own benefit of the project.
                    </p>
                    @guest
                    <a href="#explore" class="btn button-primary btn-lg fs-6 btn-lg mt-4 mt-lg-5">
                        Get Started
                    </a>
                    @endguest
                </div>
                <div class="col-md-6 d-none d-lg-block ps-5 pe-3">
                    <img src="{{ asset('images/header.png') }}" alt="Header image" class="w-100" style="margin-top: -90px;">
                </div>
            </div>
        </div>
        
         <!-- Explore -->
         <div class="container-fluid py-5 background-primary mt-lg-5" id="explore">
            <div class="row px-2 px-lg-5 py-lg-5">
                <div class="container">
                    <div class="row">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <p class="text-light fs-3 fw-bold">
                                    Newest Projects
                                </p>
                            </div>
                            <div class="p-2 bd-highlight">
                                <a href="{{ route('project.index') }}" class="btn button-secondary btn-lg fs-6">
                                    See All
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-lg-4">
                        <div class="col-md-12">
                            <div class="owl-carousel">
                                @forelse ($projects as $project)
                                    <div class="card-promos" id="card-promos-{{ $project->id }}", data-id-project="{{ $project->id }}">
                                        <img src="{{  asset('image/' . $project->image_url) }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px; object-fit: cover; height: 300px" class="w-100" alt="Promo">
                                        <div class="container px-4 pt-4 py-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="fs-4 fw-bold text-truncate">
                                                        {{ $project->title }}
                                                    </h3>
                                                    <p class="fw-light fs-6 mt-3 text-truncate" style="color: #6B7588;">
                                                        {{ $project->short_description }}
                                                    </p>

                                                    <div class="d-flex bd-highlight">
                                                        <div class="flex-grow-1 bd-highlight">
                                                            <p class="fs-6" style="color: #112D4E;">
                                                                Goals
                                                            </p>
                                                        </div>
                                                        <div class="flex-grow-1 bd-highlight text-end">
                                                            <p class="fs-6" style="color: #112D4E;">
                                                                {{ toCurrency("Rp", $project->goal_amount) }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="progress">
                                                        <div 
                                                            class="progress-bar" 
                                                            role="progressbar" 
                                                            style="width: {{ $project->status == 'active' ? reproduce_percentage($project->current_amount, $project->goal_amount) : '100' }}%; background-color: {{ $project->status == 'active' ? '#3F72AF' : '#6B7588' }};border-radius:20px" 
                                                            aria-valuenow="{{ reproduce_percentage($project->current_amount, $project->goal_amount) }}" 
                                                            aria-valuemin="0" 
                                                            aria-valuemax="100"> {{ reproduce_percentage($project->current_amount, $project->goal_amount) }}%
                                                        </div>
                                                    </div>
                  
                                                    <p class="mt-3 fw-light" style="color: #8F90A6;">
                                                        <i class="fas fa-clock me-2"></i> {{ $project->status == 'active' ? date_formatter($project->deadline) : 'Ended' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    Belum ada project
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="container-fluid pt-5 pb-5 mt-lg-5" id="explore">
            <div class="row px-2 px-lg-5 py-lg-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            <p class="fs-2 fw-bold">
                                Why Choose Us
                            </p>
                        </div>
                        <div class="col-md-12 text-center">
                            <p class="fs-5 fw-light" style="color: #879FB0;">
                                Fund Me is commited to helping its project to reach their goals.
                            </p>
                        </div>
                    </div>
                    <div class="row choose-reasons mt-5">
                        <div class="col-6 col-md-3">
                            <img src="images/reliable.png" alt="Reliable" width="85px" height="85px" />
                            <h6 class="mt-lg-4 mt-2">
                                Reliable
                            </h6>
                            <p class="fs-6">
                                Our platforms allows crowdfunding projects organization and investor to connect together. 
                            </p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="images/simple.png" alt="Reliable" width="85px" height="85px" />
                            <h6 class="mt-lg-4 mt-2">
                                Simple
                            </h6>
                            <p class="fs-6">
                                It`s easy way to donate the project in our crowdfunding platform.
                            </p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="images/charity.png" alt="Reliable" width="85px" height="85px" />
                            <h6 class="mt-lg-4 mt-2">
                                Charity and Humanity
                            </h6>
                            <p class="fs-6">
                                Help those who needs the most. Support their idea and creation to reach their goals.
                            </p>
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="images/impact.png" alt="Reliable" width="85px" height="85px" />
                            <h6 class="mt-lg-4 mt-2">
                                Make an Impact
                            </h6>
                            <p class="fs-6">
                                Help them to reach their goals. Their project will produce awesome effect.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection