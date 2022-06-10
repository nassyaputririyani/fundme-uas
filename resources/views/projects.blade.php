@extends('layouts.main')

@section('content')
  <!-- Main -->
  <main>
    <!-- Heading -->
    <div class="pb-5">
        <div class="py-5">
            <h1 class="text-center">
                Discover The <span style="color: #3F72AF;">Great<br>
                Project</span> Here
            </h1>
        </div>

        <div class="container py-5">
            <div class="row">
                @forelse ($projects as $project)
                  <div class="col-md-4 mb-4">
                    <div class="card-promos shadow" id="card-promos-{{ $project->id }}", data-id-project="{{ $project->id }}">
                      <img src="{{ $project->image_url }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px; object-fit: cover" class="w-100" alt="Promo">
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
                                          style="width: {{ reproduce_percentage($project->current_amount, $project->goal_amount) }}%; background-color: #3F72AF;border-radius:20px" 
                                          aria-valuenow="{{ reproduce_percentage($project->current_amount, $project->goal_amount) }}" 
                                          aria-valuemin="0" 
                                          aria-valuemax="100"> {{ reproduce_percentage($project->current_amount, $project->goal_amount) }}%
                                      </div>
                                  </div>

                                  <p class="mt-3 fw-light" style="color: #8F90A6;">
                                      <i class="fas fa-clock me-2"></i> {{ date_formatter($project->deadline) }}
                                  </p>
                              </div>
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
</main>
@endsection