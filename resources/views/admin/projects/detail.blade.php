@extends('admin.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Detail Projects</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                          <tr>
                            <td>Project ID</td>
                            <td>:</td>
                            <td>{{ $project->id }}</td>
                          </tr>
                          <tr>
                            <td>Gambar</td>
                            <td>:</td>
                            <td>
                              <a href="{{ asset('image/' . $project->image_url) }}" target="_blank">
                                Klik untuk membuka
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td>Project Title</td>
                            <td>:</td>
                            <td>{{ $project->title }}</td>
                          </tr>
                          <tr>
                            <td>Short Description</td>
                            <td>:</td>
                            <td>{{ $project->short_description }}</td>
                          </tr>
                          <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>{{ $project->description }}</td>
                          </tr>
                          <tr>
                            <td>Business Proposal URL</td>
                            <td>:</td>
                            <td>
                              <a href="{{ asset('business_proposal/' . $project->business_proposal_url) }}" target="_blank">
                                Klik untuk membuka
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td>Goals</td>
                            <td>:</td>
                            <td>
                              @foreach (explode(',', $project->goals) as $goal)
                                  <li>{{ $goal }}</li>
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <td>Goal Amount</td>
                            <td>:</td>
                            <td>{{ toCurrency('Rp', $project->goal_amount) }}</td>
                          </tr>
                          <tr>
                            <td>Current Amount</td>
                            <td>:</td>
                            <td>{{ toCurrency('Rp', $project->current_amount) }}</td>
                          </tr>
                          <tr>
                            <td>Deadline</td>
                            <td>:</td>
                            <td>{{ date_formatter($project->deadline) }}</td>
                          </tr>
                        </table>
                        <div class="mt-4">
                          <h5>
                            Leaderboard
                          </h5>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Rank</th>
                                <th>Transaction ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($rank_transactions as $item)
                                    <tr>
                                      <td>{{ $item->rank }}</td>
                                      <td>{{ $item->id }}</td>
                                      <td>{{ $item->name }}</td>
                                      <td>{{ toCurrency('Rp', $item->amount) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                      <td colspan="4" class="text-center">
                                        There are no transactions
                                      </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Rank</th>
                                <th>Transaction ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content -->
</div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $("#goals").select2({
            tags: true,
            theme: 'bootstrap4'
        });

        $("#users_id").select2({
            theme: 'bootstrap4'
        });

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'yyyy-M-D'
        });

        bsCustomFileInput.init();
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush