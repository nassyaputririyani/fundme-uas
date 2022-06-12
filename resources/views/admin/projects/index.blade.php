@extends('admin.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Projects</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Projects</li>
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
                    <div class="card-header">
                      <h3 class="card-title">Daftar Project</h3>
                      <a href="{{ route('admin.projects.add') }}" class="btn btn-sm btn-primary float-right">
                          Tambah
                      </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Goals</th>
                                <th>Goal Amount</th>
                                <th>Current Amount</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->user->name }}</td>
                                <td>
                                    @forelse (explode(',', $project->goals) as $goal)
                                        <li>
                                            {{ $goal }}
                                        </li>
                                    @empty
                                        Goals is empty
                                    @endforelse
                                </td>
                                <td>{{ toCurrency("Rp", $project->goal_amount) }}</td>
                                <td>{{ toCurrency("Rp", $project->current_amount) }}</td>
                                <td>{{ date_formatter($project->deadline) }}</td>
                                <td>
                                    @switch($project->status)
                                        @case('active')
                                            <p class="text-success">
                                                Active
                                            </p>
                                            @break
                                        @default
                                            <p class="text-danger">
                                                Not Active
                                            </p>
                                    @endswitch
                                </td>
                                <td class="d-flex">
                                    <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btm-sm mr-2">
                                            Edit
                                        </a>

                                        <button type="submit" class="btn btn-danger btm-sm">
                                            Delete
                                        </button>
                                        
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Goals</th>
                                <th>Goal Amount</th>
                                <th>Current Amount</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </tfoot>
                      </table>
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

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
      </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush